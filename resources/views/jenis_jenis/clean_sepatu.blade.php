@extends('components.main_view')

@section('css')
    <style>
        .logo_img{
            box-shadow: -10px 10px 5px rgb(92, 82, 82);
        }
        .logo_img2{
            box-shadow: 10px 10px 5px rgb(92, 82, 82);
        }
        .aksi{
            background: palegoldenrod;
            box-shadow: 5px 5px 5px rgb(92, 82, 82);
        }
        .vertical-line {
        display: inline-block;
        width: 1px;
        height: auto;
        background-color: black;
        margin: 0 10px;
        padding: 10px 0;
        }
        
        .sepatu{
            cursor: pointer;
        }
        .clean{
            cursor: pointer;
        }
        .opt1{
            color:blue;
        }

        .opt2{
            color:black;
        }

        .all-image{
            width: 100px;
            height: 100px;
            object-fit: cover;
        }
    </style>
@endsection

@section('container')
    <div class="container" style="margin-top:50px;">
        <div class="row">
            <div class="col-sm-12 d-flex mb-4 ">
                <div class="col-sm-8">
                    <div class="card col-sm-5 ms-auto">
                        <div class="card-body d-flex justify-content-around">
                        <div class="sepatu active d-flex flex-column text-center">
                            <span><i class="opt1 fa-sharp fa-solid fa-socks fa-lg"></i></span>
                            <a type="button" class="opt1 text-decoration-none">Jenis Sepatu</a>
                        </div>
                        <div class="vertical-line"></div>
                        <div class="clean d-flex flex-column text-center">
                            <span><i class="opt2 fa-sharp fa-solid fa-soap fa-lg"></i></span>
                            <a type="button" class="opt2  text-decoration-none">Jenis Cleaning</a>
                        </div>
                        </div>
                      </div>
                </div>
                <span class="h5 ms-auto">JENIS SEPATU & CLEANING</span>
            </div>
            <hr class="mb-4">
            
           <div class="jenis-sepatu animate__animated animate__fadeIn animate__slow">
            <div class="col-sm-12  d-flex justify-content-between flex-wrap">
                <div class="col-sm-5 mt-4 me-4">
                    <div class="d-flex">
                        <img src="/image/toko.jpg" alt="rusak" class="all-image img-fluid rounded-circle me-4">
                        <div class="theText">
                            <span class="h5 fw-bold text-uppercase">Derby</span>
                            <p class="text-muted">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ipsam, in quae eius placeat corporis sunt ex nihil totam. Maxime ipsam aspernatur quas eveniet saepe rerum molestias impedit perspiciatis dolor aliquid aut, dignissimos nemo deleniti, eaque explicabo delectus officia soluta consequuntur natus ex eos laborum, ipsum incidunt. Praesentium nam ipsa iure.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-5 mt-4 ">
                    <div class="d-flex">
                        <img src="/image/toko.jpg" alt="rusak" class="all-image img-fluid rounded-circle me-4">
                        <div class="theText">
                            <span class="h5 fw-bold text-uppercase">Derby</span>
                            <p class="text-muted">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ipsam, in quae eius placeat corporis sunt ex nihil totam. Maxime ipsam aspernatur quas eveniet saepe rerum molestias impedit perspiciatis dolor aliquid aut, dignissimos nemo deleniti, eaque explicabo delectus officia soluta consequuntur natus ex eos laborum, ipsum incidunt. Praesentium nam ipsa iure.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-5 mt-4 me-4">
                    <div class="d-flex">
                        <img src="/image/toko.jpg" alt="rusak" class="all-image img-fluid rounded-circle me-4">
                        <div class="theText">
                            <span class="h5 fw-bold text-uppercase">Derby</span>
                            <p class="text-muted">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ipsam, in quae eius placeat corporis sunt ex nihil totam. Maxime ipsam aspernatur quas eveniet saepe rerum molestias impedit perspiciatis dolor aliquid aut, dignissimos nemo deleniti, eaque explicabo delectus officia soluta consequuntur natus ex eos laborum, ipsum incidunt. Praesentium nam ipsa iure.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-5 mt-4 ">
                    <div class="d-flex">
                        <img src="/image/toko.jpg" alt="rusak" class="all-image img-fluid rounded-circle me-4">
                        <div class="theText">
                            <span class="h5 fw-bold text-uppercase">Derby</span>
                            <p class="text-muted">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ipsam, in quae eius placeat corporis sunt ex nihil totam. Maxime ipsam aspernatur quas eveniet saepe rerum molestias impedit perspiciatis dolor aliquid aut, dignissimos nemo deleniti, eaque explicabo delectus officia soluta consequuntur natus ex eos laborum, ipsum incidunt. Praesentium nam ipsa iure.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-5 mt-4 me-4">
                    <div class="d-flex">
                        <img src="/image/toko.jpg" alt="rusak" class="all-image img-fluid rounded-circle me-4">
                        <div class="theText">
                            <span class="h5 fw-bold text-uppercase">Derby</span>
                            <p class="text-muted">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ipsam, in quae eius placeat corporis sunt ex nihil totam. Maxime ipsam aspernatur quas eveniet saepe rerum molestias impedit perspiciatis dolor aliquid aut, dignissimos nemo deleniti, eaque explicabo delectus officia soluta consequuntur natus ex eos laborum, ipsum incidunt. Praesentium nam ipsa iure.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-5 mt-4 ">
                    <div class="d-flex">
                        <img src="/image/toko.jpg" alt="rusak" class="all-image img-fluid rounded-circle me-4">
                        <div class="theText">
                            <span class="h5 fw-bold text-uppercase">Derby</span>
                            <p class="text-muted">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ipsam, in quae eius placeat corporis sunt ex nihil totam. Maxime ipsam aspernatur quas eveniet saepe rerum molestias impedit perspiciatis dolor aliquid aut, dignissimos nemo deleniti, eaque explicabo delectus officia soluta consequuntur natus ex eos laborum, ipsum incidunt. Praesentium nam ipsa iure.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-5 mt-4 me-4">
                    <div class="d-flex">
                        <img src="/image/toko.jpg" alt="rusak" class="all-image img-fluid rounded-circle me-4">
                        <div class="theText">
                            <span class="h5 fw-bold text-uppercase">Derby</span>
                            <p class="text-muted">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ipsam, in quae eius placeat corporis sunt ex nihil totam. Maxime ipsam aspernatur quas eveniet saepe rerum molestias impedit perspiciatis dolor aliquid aut, dignissimos nemo deleniti, eaque explicabo delectus officia soluta consequuntur natus ex eos laborum, ipsum incidunt. Praesentium nam ipsa iure.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-5 mt-4 ">
                    <div class="d-flex">
                        <img src="/image/toko.jpg" alt="rusak" class="all-image img-fluid rounded-circle me-4">
                        <div class="theText">
                            <span class="h5 fw-bold text-uppercase">Derby</span>
                            <p class="text-muted">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ipsam, in quae eius placeat corporis sunt ex nihil totam. Maxime ipsam aspernatur quas eveniet saepe rerum molestias impedit perspiciatis dolor aliquid aut, dignissimos nemo deleniti, eaque explicabo delectus officia soluta consequuntur natus ex eos laborum, ipsum incidunt. Praesentium nam ipsa iure.</p>
                        </div>
                    </div>
                </div>
            </div>
           </div>

            {{-- :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::: --}}
          
            <div class="jenis-cleaning animate__animated animate__fadeIn animate__slow" style="display:none;">
                <div class="col-sm-12 d-flex justify-content-between flex-wrap">
                    <div class="col-sm-5 mt-4 me-4">
                        <div class="d-flex">
                            <img src="/image/M.png" alt="rusak" class="all-image img-fluid rounded-circle me-4">
                            <div class="theText">
                                <span class="h5 fw-bold text-uppercase">deep cleaning</span>
                                <p class="text-muted">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ipsam, in quae eius placeat corporis sunt ex nihil totam. Maxime ipsam aspernatur quas eveniet saepe rerum molestias impedit perspiciatis dolor aliquid aut, dignissimos nemo deleniti, eaque explicabo delectus officia soluta consequuntur natus ex eos laborum, ipsum incidunt. Praesentium nam ipsa iure.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-5 mt-4 ">
                        <div class="d-flex">
                            <img src="/image/M.png" alt="rusak" class="all-image img-fluid rounded-circle me-4">
                            <div class="theText">
                                <span class="h5 fw-bold text-uppercase">deep cleaning</span>
                                <p class="text-muted">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ipsam, in quae eius placeat corporis sunt ex nihil totam. Maxime ipsam aspernatur quas eveniet saepe rerum molestias impedit perspiciatis dolor aliquid aut, dignissimos nemo deleniti, eaque explicabo delectus officia soluta consequuntur natus ex eos laborum, ipsum incidunt. Praesentium nam ipsa iure.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-5 mt-4 me-4">
                        <div class="d-flex">
                            <img src="/image/M.png" alt="rusak" class="all-image img-fluid rounded-circle me-4">
                            <div class="theText">
                                <span class="h5 fw-bold text-uppercase">deep cleaning</span>
                                <p class="text-muted">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ipsam, in quae eius placeat corporis sunt ex nihil totam. Maxime ipsam aspernatur quas eveniet saepe rerum molestias impedit perspiciatis dolor aliquid aut, dignissimos nemo deleniti, eaque explicabo delectus officia soluta consequuntur natus ex eos laborum, ipsum incidunt. Praesentium nam ipsa iure.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-5 mt-4 ">
                        <div class="d-flex">
                            <img src="/image/M.png" alt="rusak" class="all-image img-fluid rounded-circle me-4">
                            <div class="theText">
                                <span class="h5 fw-bold text-uppercase">deep cleaning</span>
                                <p class="text-muted">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ipsam, in quae eius placeat corporis sunt ex nihil totam. Maxime ipsam aspernatur quas eveniet saepe rerum molestias impedit perspiciatis dolor aliquid aut, dignissimos nemo deleniti, eaque explicabo delectus officia soluta consequuntur natus ex eos laborum, ipsum incidunt. Praesentium nam ipsa iure.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-5 mt-4 me-4">
                        <div class="d-flex">
                            <img src="/image/M.png" alt="rusak" class="all-image img-fluid rounded-circle me-4">
                            <div class="theText">
                                <span class="h5 fw-bold text-uppercase">deep cleaning</span>
                                <p class="text-muted">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ipsam, in quae eius placeat corporis sunt ex nihil totam. Maxime ipsam aspernatur quas eveniet saepe rerum molestias impedit perspiciatis dolor aliquid aut, dignissimos nemo deleniti, eaque explicabo delectus officia soluta consequuntur natus ex eos laborum, ipsum incidunt. Praesentium nam ipsa iure.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-5 mt-4 ">
                        <div class="d-flex">
                            <img src="/image/M.png" alt="rusak" class="all-image img-fluid rounded-circle me-4">
                            <div class="theText">
                                <span class="h5 fw-bold text-uppercase">deep cleaning</span>
                                <p class="text-muted">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ipsam, in quae eius placeat corporis sunt ex nihil totam. Maxime ipsam aspernatur quas eveniet saepe rerum molestias impedit perspiciatis dolor aliquid aut, dignissimos nemo deleniti, eaque explicabo delectus officia soluta consequuntur natus ex eos laborum, ipsum incidunt. Praesentium nam ipsa iure.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-5 mt-4 me-4">
                        <div class="d-flex">
                            <img src="/image/M.png" alt="rusak" class="all-image img-fluid rounded-circle me-4">
                            <div class="theText">
                                <span class="h5 fw-bold text-uppercase">deep cleaning</span>
                                <p class="text-muted">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ipsam, in quae eius placeat corporis sunt ex nihil totam. Maxime ipsam aspernatur quas eveniet saepe rerum molestias impedit perspiciatis dolor aliquid aut, dignissimos nemo deleniti, eaque explicabo delectus officia soluta consequuntur natus ex eos laborum, ipsum incidunt. Praesentium nam ipsa iure.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-5 mt-4 ">
                        <div class="d-flex">
                            <img src="/image/M.png" alt="rusak" class="all-image img-fluid rounded-circle me-4">
                            <div class="theText">
                                <span class="h5 fw-bold text-uppercase">deep cleaning</span>
                                <p class="text-muted">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ipsam, in quae eius placeat corporis sunt ex nihil totam. Maxime ipsam aspernatur quas eveniet saepe rerum molestias impedit perspiciatis dolor aliquid aut, dignissimos nemo deleniti, eaque explicabo delectus officia soluta consequuntur natus ex eos laborum, ipsum incidunt. Praesentium nam ipsa iure.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           
            <script>
                $(document).ready(function(){
                    $('.sepatu').click(function(){
                        $('.opt1').css('color' , 'blue');
                        $('.opt2').css('color' , 'black');
                        $('.jenis-sepatu').show();
                        $('.jenis-cleaning').hide();
                    })

                    $('.clean').click(function(){
                        $('.opt1').css('color' , 'black');
                        $('.opt2').css('color' , 'blue');
                        $('.jenis-sepatu').hide();
                        $('.jenis-cleaning').show();
                    })
                })
            </script>

          

          

        </div>
    </div>

 
@endsection
