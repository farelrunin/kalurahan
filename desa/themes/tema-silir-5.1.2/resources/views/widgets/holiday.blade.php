<div id="countdownWidget" 
  x-data="countdownData()" 
  x-init="initCountdown()"
  x-show="hasEvent" 
  x-cloak
  class="flex flex-col lg:flex-row gap-3 fade-transition">
  
  <div class="lg:w-5/12 bg-secondary bg-opacity-90 px-5 py-3 text-white flex flex-col justify-center rounded-lg relative overflow-hidden transform transition-all duration-300 hover:scale-[1.02] cursor-default shadow-md">
    <div class="absolute inset-0 bg-flower bg-right-top bg-no-repeat opacity-20" style="background-size: 150px;"></div>
    <p class="text-xs font-semibold mb-1 relative z-10" x-text="widgetTitle">Memuat...</p>
    <span class="text-lg lg:text-2xl font-bold relative z-10" x-text="eventName">Memuat nama perayaan...</span>
    <span class="text-sm lg:text-base relative z-10">
      <i class="ti ti-calendar mr-2"></i> <span x-text="formatDateID(eventNameDate)" class="text-gray-200">Memuat tanggal...</span>
    </span>
  </div>

  <div class="lg:w-7/12 grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-3 sm:gap-4">
    <div class="accent-top-left bg-white dark:bg-dark-secondary p-2 shadow-md rounded-lg flex flex-col items-center justify-center text-center relative overflow-hidden transform transition-all duration-300 hover:scale-105 hover:shadow-lg">
      <span class="text-xs lg:text-sm tracking-widest capitalize text-primary dark:text-white font-medium mb-1 relative z-10">Hari</span>
      <span class="text-xl lg:text-3xl font-bold relative z-10">
        <span x-text="days === null ? '' : formatTwoDigits(days)"></span>
        <span x-show="days === null" class="animate-spin inline-block"><i class="ti ti-loader-2 text-xl"></i></span>
      </span>
    </div>
    <div class="accent-top-left bg-white dark:bg-dark-secondary p-2 shadow-md rounded-lg flex flex-col items-center justify-center text-center relative overflow-hidden transform transition-all duration-300 hover:scale-105 hover:shadow-lg">
      <span class="text-xs lg:text-sm tracking-widest capitalize text-primary dark:text-white font-medium mb-1 relative z-10">Jam</span>
      <span class="text-xl lg:text-3xl font-bold relative z-10">
        <span x-text="hours === null ? '' : formatTwoDigits(hours)"></span>
        <span x-show="hours === null" class="animate-spin inline-block"><i class="ti ti-loader-2 text-xl"></i></span>
      </span>
    </div>
    <div class="accent-top-left bg-white dark:bg-dark-secondary p-2 shadow-md rounded-lg flex flex-col items-center justify-center text-center relative overflow-hidden transform transition-all duration-300 hover:scale-105 hover:shadow-lg">
      <span class="text-xs lg:text-sm tracking-widest capitalize text-primary dark:text-white font-medium mb-1 relative z-10">Menit</span>
      <span class="text-xl lg:text-3xl font-bold relative z-10">
        <span x-text="minutes === null ? '' : formatTwoDigits(minutes)"></span>
        <span x-show="minutes === null" class="animate-spin inline-block"><i class="ti ti-loader-2 text-xl"></i></span>
      </span>
    </div>
    <div class="accent-top-left bg-white dark:bg-dark-secondary p-2 shadow-md rounded-lg flex flex-col items-center justify-center text-center relative overflow-hidden transform transition-all duration-300 hover:scale-105 hover:shadow-lg">
      <span class="text-xs lg:text-sm tracking-widest capitalize text-primary dark:text-white font-medium mb-1 relative z-10">Detik</span>
      <span class="text-xl lg:text-3xl font-bold relative z-10">
        <span x-text="seconds === null ? '' : formatTwoDigits(seconds)"></span>
        <span x-show="seconds === null" class="animate-spin inline-block"><i class="ti ti-loader-2 text-xl"></i></span>
      </span>
    </div>
  </div>
</div>

@push('styles')
<style>
  [x-cloak] { display: none !important; }
  .fade-transition {
    transition-property: opacity;
    transition-duration: 300ms;
  }
  .fade-transition-enter, .fade-transition-leave-to {
    opacity: 0;
  }
  .fade-transition-enter-active, .fade-transition-leave-active {
    transition: opacity 0.3s ease-in-out;
  }
  .bg-5 {
    background-size: 5%;
  }
  .accent-top-left::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 50px;
    height: 50px;
    background-color: rgba(63, 81, 181, 0.2); /* Warna secondary dengan opacity */
    border-bottom-right-radius: 100%;
    z-index: 0;
  }
</style>
@endpush
@push('scripts')
<script>
  const EVENTS_JSON_URL = 'https://cdn.silirdev.com/widgets/events.json';

  document.addEventListener('alpine:init', () => {
    Alpine.data('countdownData', () => ({
      events: [],
      nearestEvent: null,
      countdownInterval: null,
      
      widgetTitle: 'Memuat...',
      eventName: 'Memuat nama perayaan...',
      eventNameDate: '',
      days: null,
      hours: null,
      minutes: null,
      seconds: null,
      hasEvent: false,

      formatTwoDigits(number) {
        return number < 10 ? '0' + number : number;
      },

      formatDateID(dateString) {
        if (!dateString) return 'Memuat tanggal...';
        const options = { year: 'numeric', month: 'long', day: 'numeric' };
        const date = new Date(dateString);
        return date.toLocaleDateString('id-ID', options);
      },

      initCountdown() {
        this.days = null;
        this.hours = null;
        this.minutes = null;
        this.seconds = null;
        this.widgetTitle = 'Memuat...';
        this.eventName = 'Memuat nama perayaan...';
        this.eventNameDate = '';
        this.hasEvent = false;

        this.fetchEvents();
      },

      fetchEvents() {
        $.getJSON(EVENTS_JSON_URL)
          .done(data => {
            this.events = data;
            this.findAndDisplayNearestEvent();
          })
          .fail((jqxhr, textStatus, error) => {
            console.error("Gagal memuat data event dari CDN: " + textStatus + ", " + error);
            this.hasEvent = false;
          });
      },

      findAndDisplayNearestEvent() {
        const now = new Date();
        let currentNearestEvent = null;
        let minTimeDiffMs = Infinity;

        const sortedEvents = [...this.events].sort((a, b) => new Date(a.tanggal) - new Date(b.tanggal));

        $.each(sortedEvents, (index, event) => {
          const eventDate = new Date(event.tanggal);
          eventDate.setHours(0, 0, 0, 0);

          const targetTime = eventDate.getTime();
          const timeDiffMs = targetTime - now.getTime();
          
          const tenDaysInMs = 10 * 24 * 60 * 60 * 1000;
          
          if (timeDiffMs > 0 && timeDiffMs <= tenDaysInMs && timeDiffMs < minTimeDiffMs) {
            minTimeDiffMs = timeDiffMs;
            currentNearestEvent = event;
          }
        });

        this.nearestEvent = currentNearestEvent;

        if (this.countdownInterval) {
          clearInterval(this.countdownInterval);
        }

        if (this.nearestEvent) {
          this.widgetTitle = this.nearestEvent.jenis;
          this.eventName = this.nearestEvent.nama_perayaan;
          this.eventNameDate = this.nearestEvent.tanggal; 
          this.hasEvent = true;

          this.startCountdownTimer();
        } else {
          this.hasEvent = false;
        }
      },

      startCountdownTimer() {
        const updateTimer = () => {
          const currentTime = new Date().getTime();
          const targetEventDate = new Date(this.nearestEvent.tanggal);
          targetEventDate.setHours(0, 0, 0, 0);
          const distance = targetEventDate.getTime() - currentTime;

          if (distance < 0) {
            clearInterval(this.countdownInterval);
            this.findAndDisplayNearestEvent(); 
            return;
          }

          this.days = Math.floor(distance / (1000 * 60 * 60 * 24));
          this.hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
          this.minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
          this.seconds = Math.floor((distance % (1000 * 60)) / 1000);
        };

        updateTimer();
        this.countdownInterval = setInterval(updateTimer, 1000);
      }
    }));
  });
</script>
@endpush