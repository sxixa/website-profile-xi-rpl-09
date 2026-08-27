@extends('layouts.app')

@section('content')
<div style="background-color: #f8fafc; min-height: 100vh; padding: 3rem 1.5rem; font-family: system-ui, -apple-system, sans-serif;">
    <div style="max-width: 1100px; margin: 0 auto;">
        
        <!-- Header Halaman -->
        <div style="text-align: center; margin-bottom: 3rem;">
            <h1 style="font-size: 2.25rem; font-weight: 700; color: #1e293b; margin-bottom: 0.5rem;">Kontak Tim Developer</h1>
            <p style="color: #64748b; font-size: 1rem; margin: 0;">Hubungi kami untuk informasi lebih lanjut mengenai proyek XI RPL</p>
        </div>

        <!-- Grid Kartu Kontak -->
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 1.5rem;">
            
            <!-- Card 1: Email -->
            <div style="background: #ffffff; border-radius: 12px; padding: 1.5rem; border-top: 4px solid #2563eb; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);">
                <h2 style="font-size: 1.25rem; font-weight: 700; color: #1e293b; margin: 0 0 0.25rem 0;">Email Resmi</h2>
                <span style="color: #2563eb; font-size: 0.875rem; font-weight: 500; display: block; margin-bottom: 0.75rem;">Developer Kontak</span>
                <p style="color: #475569; font-size: 0.95rem; margin: 0; line-height: 1.5;">xi.rpl@example.com</p>
            </div>

            <!-- Card 2: Instagram -->
            <div style="background: #ffffff; border-radius: 12px; padding: 1.5rem; border-top: 4px solid #2563eb; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);">
                <h2 style="font-size: 1.25rem; font-weight: 700; color: #1e293b; margin: 0 0 0.25rem 0;">Instagram</h2>
                <span style="color: #2563eb; font-size: 0.875rem; font-weight: 500; display: block; margin-bottom: 0.75rem;">Media Sosial</span>
                <p style="color: #475569; font-size: 0.95rem; margin: 0; line-height: 1.5;">@xi_rpl</p>
            </div>

            <!-- Card 3: Alamat Sekolah -->
            <div style="background: #ffffff; border-radius: 12px; padding: 1.5rem; border-top: 4px solid #2563eb; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);">
                <h2 style="font-size: 1.25rem; font-weight: 700; color: #1e293b; margin: 0 0 0.25rem 0;">Alamat Sekolah</h2>
                <span style="color: #2563eb; font-size: 0.875rem; font-weight: 500; display: block; margin-bottom: 0.75rem;">Lokasi Kampus</span>
                <p style="color: #475569; font-size: 0.95rem; margin: 0; line-height: 1.5;">SMKN 1 Garut</p>
            </div>

        </div>
    </div>
</div>
@endsection