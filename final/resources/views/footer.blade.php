<!-- Footer Start -->
<div class="container-fluid bg-secondary text-dark mt-5 pt-5">
        <div class="row px-xl-5 pt-5">
            <div class="col-sm-5 col-md-6">
                <a href="" class="text-decoration-none">
                    <h1 class="mb-4 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border border-white px-3 mr-1">E</span>Shopper</h1>
                </a>
                <p>Shop with us. Explore different books, cds, games and many more product</p>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>Pulchowk, Lalitpur</p>
                <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>info@eshopper.com</p>
                <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+01 520839</p>
            </div>

                    <div class="col-sm-5 offset-sm-2 col-md-6 offset-md-0">
                        <h5 class="font-weight-bold text-dark mb-4">Newsletter</h5>
                        <form action="{{route('subscribe')}}" method ="post">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control border-0 py-4" name="name" placeholder="Your Name" required="required" />
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control border-0 py-4"  name="email" placeholder="Your Email"
                                    required="required" />
                            </div>
                            <div>
                                <button class="btn btn-primary btn-block border-0 py-3" type="submit">Subscribe Now</button>
                            </div>
                        </form>
                    </div>
            
        </div>
    
        <div class="row border-top border-light mx-xl-5 py-4">
            <div class="col-md-6 px-xl-0">
                <p class="mb-md-0 text-center text-md-left text-dark">
                    &copy; <a class="text-dark font-weight-semi-bold" href="#">E-shopper</a>. All Rights Reserved. 
                    by
                    <a class="text-dark font-weight-semi-bold" href="">Manisha Yadav</a><br>
                </p>
            </div>
            <div class="col-md-6 px-xl-0 text-center text-md-right">
                <img class="img-fluid" src="img/payments.png" alt="">
            </div>
        </div>
    </div>
 
    <!-- Footer End -->