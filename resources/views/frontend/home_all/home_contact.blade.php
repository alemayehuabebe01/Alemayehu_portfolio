@php
    $allfooter = App\Models\Footer::find(1);
@endphp


<section class="homeContact">
    <div class="container">
        <div class="homeContact__wrap">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section__title">
                        <span class="sub-title">07 - Say hello</span>
                        <h2 class="title">Any questions? Feel free <br> to contact</h2>
                    </div>
                    <div class="homeContact__content">
                        <p>{{  $allfooter->short_description }}</p>
                        <h2 class="mail"><a href="mailto:{{  $allfooter->email }}">{{  $allfooter->email }}</a></h2>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="homeContact__form">
                        <form action="{{ route('store.message') }}" class="contact__form" method="post">
                            @csrf
                            <input name="name" type="text" placeholder="Enter name*">
                            <input name="email" type="email" placeholder="Enter mail*">
                            <input  name="phone" type="text" placeholder="Enter Phone number*">
                            <input name="subject" type="text" placeholder="Enter subject*">
                            <textarea name="message" id="message" placeholder="Enter your massage*"></textarea>
                            <button type="submit">Send Message</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>