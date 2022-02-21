<div id="sliderIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">

        <div class="carousel-item active">
            <div class="row">
                <div class="col">
                    <strong>{{ $phrases[0] }}</strong>
                </div>
                <div class="col">
                    <strong>{{ $phrases[1] }}</strong>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="row">
                <div class="col">
                    <strong>{{ $phrases[2] }}</strong>
                </div>
                <div class="col">
                    <strong>{{ $phrases[3] }}</strong>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="row">
                <div class="col">
                    <strong>{{ $phrases[4] }}</strong>
                </div>
                <div class="col">
                    <strong>{{ $phrases[5] }}</strong>
                </div>
            </div>
        </div>
    </div>
    <br>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="row align-content-center">
                    <div class="col">
                        <button
                            class="btn btn-info"
                            type="button"
                            data-bs-target="#sliderIndicators"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                    </div>
                    <div class="col">
                        <button
                            class="btn btn-info"
                            type="button"
                            data-bs-target="#sliderIndicators"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
