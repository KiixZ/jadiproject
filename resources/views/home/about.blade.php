@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/drive.css') }}">
<div class="min-h-screen bg-gray-100 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        <!-- Hero Section -->
        <div class="text-center mb-16">
            <h1 class="text-4xl font-bold text-gray-900 mb-4">Tentang Kami</h1>
            <p class="text-lg text-gray-600">Mengenal lebih dekat <span class="text-custom-secondary font-medium">Alfaza</span><span class="text-custom font-medium">Grilled</span></p>
        </div>

        <!-- About Content -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
            <!-- Company Overview -->
            <div class="bg-white p-8 rounded-lg shadow-lg">
                <h2 class="text-2xl font-bold text-gray-900 mb-4 text-center md:text-left">Visi Kami</h2>
                <p class="text-gray-600 leading-relaxed text-center">
                    Menjadi pionir inovasi digital yang nggak cuma canggih, tapi juga nyambung sama kebutuhan
                    zaman - menginspirasi generasi muda untuk berkreasi tanpa batas.
                </p>
            </div>

            <!-- Mission Section -->
            <div class="bg-white p-8 rounded-lg shadow-lg">
                <h2 class="text-2xl font-bold text-gray-900 mb-4 text-center md:text-left">Misi Kami</h2>
                <ul class="list-disc list-inside text-gray-600 space-y-2">
                    <li>Mendorong <span class="text-custom font-medium">kolaborasi</span> dan kreativitas dalam setiap
                        langkah,
                        karena kerja bareng itu
                        lebih asik
                        daripada kerja sendiri.
                    </li>
                    <li>Menghadirkan <span class="text-custom font-medium">solusi digital</span> yang praktis, aman, dan
                        berkelanjutan buat generasi sekarang dan
                        masa depan.
                    </li>
                    <li>Menjadi <span class="text-custom font-medium">wadah pengembangan talenta muda</span> yang siap
                        menghadapi tantangan global dengan <span
                            class="text-custom-secondary font-medium italic">ide-ide
                            yang out of the box</span>.
                    </li>
                    <li> <span class="text-custom font-medium">Terus belajar dan beradaptasi</span> dengan perkembangan
                        teknologi, <span class="text-custom-secondary font-medium">karena di dunia digital, stagnasi
                            itu berarti ketinggalan.</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Location Section -->
    <div class="max-w-7xl mx-auto mt-12">
        <div class="bg-white p-8 rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold text-gray-900 mb-4 text-center md:text-left">Lokasi Kami</h2>
            <p class="text-gray-600 leading-relaxed mb-6 text-center md:text-left">
                Kunjungi kami di lokasi berikut:
            </p>
            <div class="rounded-lg overflow-hidden border border-gray-200 shadow-sm">
                <iframe
                    width="100%"
                    height="400"
                    style="border:0"
                    loading="lazy"
                    allowfullscreen
                    referrerpolicy="no-referrer-when-downgrade"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.313492415425!2d109.1457562!3d-6.852975600000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6fb79c0e41f47b%3A0x8645589da09dd1c!2sWarung%20Makan%20Kharisma!5e0!3m2!1sid!2sid!4v1748546058570!5m2!1sid!2sid">
                </iframe>
            </div>
        </div>
    </div>

@endsection