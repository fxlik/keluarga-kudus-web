@inject('tampilan','App\Http\Controllers\ClientBerandaController')
@extends('client.layout')

@section('content')
<!-- ##### Contact Area Start ##### -->
<div style="margin-top:120px;"></div>
<section class="contact-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="contact-content-area">
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <div class="contact-content contact-information">
                                <h4>Kontak</h4>
                                <p>{{$tampilan->tampilan()->email}}</p>
                                <p>{{$tampilan->tampilan()->no_hp}}</p>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="contact-content contact-information">
                                <h4>Alamat</h4>
                                <p>{{$tampilan->tampilan()->alamat}}</p>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="contact-content contact-information">
                                <h4>Jadwal Ibadah</h4>
                                {{$tampilan->tampilan()->jadwal_ibadah}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Contact Area End ##### -->
<!-- ##### Contact Form Area Start ##### -->
<div class="contact-form section-padding-0-100">
    <div class="container">
        <div class="row">
            <!-- Section Heading -->
            <div class="col-12">
                <div class="section-heading">
                    <h2>Tinggalkan Pesan</h2>
                    <p>Beri masukan, pesan atau saran kepada kami.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <!-- Contact Form Area -->
                <div class="contact-form-area">
                    <form action="{{route('client.kirimPesan')}}" method="post">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-12 col-lg-4">
                                <div class="form-group">
                                    <label for="contact-name">Nama Lengkap*:</label>
                                    <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" required>
                                </div>
                            </div>
                            <div class="col-12 col-lg-4">
                                <div class="form-group">
                                    <label for="contact-email">Email*:</label>
                                    <input type="email" class="form-control" id="contact-email" name="email" placeholder="emailkamu@email.com" required>
                                </div>
                            </div>
                            <div class="col-12 col-lg-4">
                                <div class="form-group">
                                    <label for="contact-number">Nomor Handphone*:</label>
                                    <input type="text" class="form-control" id="contact-number" name="hp" placeholder="081234567890" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="message">Pesan*:</label>
                                    <textarea class="form-control" name="pesan" id="message" name="pesan" cols="30" rows="10" placeholder="Pesan..." required></textarea>
                                </div>
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" onclick="return confirm('Kirim Pesan?')" class="btn crose-btn mt-15">Kirim</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Contact Form Area End ##### -->
@endsection