new Vue({
    el: '#consult',
    data: {
        height: '',
        weight: '',
        bmi: '',
        h:'',
        w:'',

    },
    created() {
        this.getBMI();
    },
    methods: {
        onBMI() {
            this.h = parseInt(this.height) * parseInt(this.height);
            this.w = parseInt(this.weight) * 703;
            this.bmi =   this.w/this.h;
        },
        getBMI(){
            this.height = document.getElementById("height").value;
            this.weight = document.getElementById("weight").value;
            this.onBMI();


        }
    }
});