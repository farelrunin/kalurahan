<a href="#" class="fixed bottom-0 right-0 lg:mb-5 mr-5 bg-primary text-white focus:outline-none ring-2 ring-primary ring-offset-2 items-center justify-center w-10 h-10 rounded-full z-40 lg:flex hidden transition duration:300" data-bs-target="#modal-login" data-bs-toggle="modal" @click="drawer = false" style="margin-bottom: 70px;" x-data="{menuBtn: false}"
  @scroll.window="menuBtn = window.scrollY > document.querySelector('#header').getBoundingClientRect().top + 100"
  :class="{'opacity-100': menuBtn, 'opacity-0': !menuBtn}">
  <i class="ti ti-menu-2 text-lg"></i>
</a>