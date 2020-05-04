export default {
    methods:{
        convertDate(str) {
            var date = new Date(str),
                mnth = ("0" + (date.getMonth() + 1)).slice(-2),
                day = ("0" + date.getDate()).slice(-2);
            return [date.getFullYear(), mnth, day].join("-");
        },
        validateDates(){
            if (this.form.date_posted==='' || this.form.expiry_date ===''){
                return 0;
            }
            this.form.date_posted = this.convertDate(this.form.date_posted);
            this.form.expiry_date = this.convertDate(this.form.expiry_date);
            if (this.form.date_posted > this.form.expiry_date){
                return -1;
            }
            return 1;
        },
    }
}
