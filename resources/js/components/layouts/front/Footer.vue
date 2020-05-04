<template>
<div>
    <footer class="footer-area section-gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-3  col-md-12">
                    <div class="single-footer-widget">
                        <h6>Top Products</h6>
                        <ul class="footer-nav">
                            <li><a href="#">Managed Website</a></li>
                            <li><a href="#">Manage Reputation</a></li>
                            <li><a href="#">Power Tools</a></li>
                            <li><a href="#">Marketing Service</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6  col-md-12">
                    <div class="single-footer-widget newsletter">
                        <h6>RSS FEEDS</h6>
                        <p>You can trust us. we only send promo offers, not a single spam.</p>
                        <div>
                            <form @submit.prevent="subscribe()">

                                <div class="form-group row" style="width: 100%">
                                    <div class="col-lg-8 col-md-12">
                                        <input v-model="email" placeholder="Enter Email"  required="" type="email">
                                    </div>

                                    <div class="col-lg-4 col-md-12">
                                        <button class="nw-btn primary-btn">Subscribe<span class="lnr lnr-arrow-right"></span></button>
                                    </div>
                                </div>
                                <div class="info"></div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3  col-md-12">
                    <div class="single-footer-widget mail-chimp">
                        <h6 class="mb-20">Instragram Feed</h6>
                        <ul class="instafeed d-flex flex-wrap">
                            <li><img src="images/front/i1.jpg" alt=""></li>
                            <li><img src="images/front/i2.jpg" alt=""></li>
                            <li><img src="images/front/i3.jpg" alt=""></li>
                            <li><img src="images/front/i4.jpg" alt=""></li>
                            <li><img src="images/front/i5.jpg" alt=""></li>
                            <li><img src="images/front/i6.jpg" alt=""></li>
                            <li><img src="images/front/i7.jpg" alt=""></li>
                            <li><img src="images/front/i8.jpg" alt=""></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row footer-bottom d-flex justify-content-between">
                <p class="col-lg-8 col-sm-12 footer-text m-0 text-white">
                    Copyright &copy; All rights reserved by <a href="#" target="_blank">Vincent</a>

                </p>
                <div class="col-lg-4 col-sm-12 footer-social">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-dribbble"></i></a>
                    <a href="#"><i class="fa fa-behance"></i></a>
                </div>
            </div>
        </div>
    </footer>
    <!-- End footer Area -->


    <script type="application/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script type="application/javascript" src="js/front/js/vendor/bootstrap.min.js"></script>
    <script type="application/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
    <script type="application/javascript" src="js/front/js/easing.min.js"></script>
    <script type="application/javascript" src="js/front/js/hoverIntent.js"></script>
    <script type="application/javascript" src="js/front/js/superfish.min.js"></script>
    <script type="application/javascript" src="js/front/js/jquery.ajaxchimp.min.js"></script>
    <script type="application/javascript" src="js/front/js/jquery.magnific-popup.min.js"></script>
    <script type="application/javascript" src="js/front/js/owl.carousel.min.js"></script>
    <script type="application/javascript" src="js/front/js/jquery.sticky.js"></script>
    <script type="application/javascript" src="js/front/js/jquery.nice-select.min.js"></script>
    <script type="application/javascript" src="js/front/js/parallax.min.js"></script>
    <script type="application/javascript" src="js/front/js/mail-script.js"></script>
    <script type="application/javascript" src="js/front/js/main.js"></script>
</div>
</template>

<script>
    export default {
        data(){
            return{
                email:''
            }
        },
        methods:{
            subscribe(){
                axios.post('subscribe',{email:this.email})
                .then(res =>{
                    console.log(res.data)
                    if (res.data ==='error'){
                    return this.$toastr.e('An error occurred,please try again later.')
                    }
                    this.$toastr.s('Successfully subscribed please check you email for updates')
                })
            }
        }
    }
</script>

<style scoped>

</style>
