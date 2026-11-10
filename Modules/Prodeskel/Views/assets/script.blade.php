{{-- prettier-ignore-start --}}
    const decimalObj = {
                alias: 'decimal',
                groupSeparator: '.',
                autoGroup: true,
                autoUnmask: true,
                allowMinus: false,                
                radixPoint: ',',
                digits: 2,                
            }
    const integerObj = {
                alias: 'integer',
                groupSeparator: '.',
                autoGroup: true,
                autoUnmask: true,
                allowMinus: false,
            }
    const getRawValue = function(name) {
        let val = $(`input[name=${name}]`).inputmask('unmaskedvalue');
        return val ? parseFloat(val.replace('.','').replace(',', '.')) : 0;
    }

    const indonesiaFormat = function(number) {
        return new Intl.NumberFormat('id-ID').format(number);
    }

{{-- prettier-ignore-end --}}
