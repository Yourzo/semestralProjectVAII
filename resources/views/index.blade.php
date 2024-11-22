<x-app-layout>
    <x-footer>
<!--Carousel add screenshot of actual working app like to show potential customers-->
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner carousel-height">
        <div class="carousel-item active">
            <img src="images/balls.jpg" class="d-block w-100 image-size" alt="...">
        </div>
        <div class="carousel-item">
            <img src="images/dfpsw.jpg" class="d-block w-100 image-size" alt="...">
        </div>
        <div class="carousel-item">
            <img src="images/street.jpg" class="d-block w-100 image-size" alt="...">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<!-- Propagation -->
<div class="ideas-container">
    <div class="accordion ideas-item" id="accordionExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                    ✨Original IDEA✨
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <strong>Our idea team</strong> came up with this obviously original ✨idea✨ of this application.
                    We proud ourselves with original ideas that our dedicated team is coming up every day.
                    We hope that this ✨idea✨ was never even thought about, and if so we do not really care.
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    🛠️BUILD quality🛠️
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <strong>Our construction team</strong> 🛠️constructed🛠️ this project based on ✨idea✨ of our idea team.
                    Project was 🛠️built🛠️ by quality materials like nuts and bolts they sell at hornbach.
                    We are happy that our 🛠️construction🛠️ is of high standard even in this economy.
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    🩹Incredible SUPPORT🩹
                </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <strong>Our support team</strong> will 🩹support🩹 you at your worst. Where our 🛠️construction🛠️ fails (which never does)
                    our 🩹support🩹 will take care of your needs. When our ✨idea✨ is just not enough (which never is) our
                    🩹support🩹 is always here to make things to happen.
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5 ideas-item d-flex justify-content-center align-items-center">
        <form class="register-width">
            <div class="mb-3">
                <label for="email" class="form-label">Get into VRELLO</label>
                <input type="email" class="form-control" id="email" placeholder="Enter your email" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Register</button>
        </form>
    </div>
</div>
    </x-footer>
</x-app-layout>
