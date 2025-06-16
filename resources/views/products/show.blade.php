@extends('layouts.app')

@section('content')
<div style="max-width: 1000px; margin: 2rem auto 1rem auto; padding-left: 0.5rem;">
    <a href="{{ url()->previous() }}"
       style="display: inline-flex; align-items: center; gap: 8px;
              padding: 0.6rem 1.2rem; background-color: #f9fafb;
              color: #1f2937; border: 1px solid #d1d5db;
              border-radius: 8px; font-size: 0.875rem;
              font-weight: 500; text-decoration: none;
              box-shadow: 0 2px 5px rgba(0,0,0,0.05);
              transition: all 0.3s ease;"
       onmouseover="this.style.backgroundColor='#e5e7eb'; this.style.boxShadow='0 4px 12px rgba(0,0,0,0.1)'"
       onmouseout="this.style.backgroundColor='#f9fafb'; this.style.boxShadow='0 2px 5px rgba(0,0,0,0.05)'">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
             viewBox="0 0 16 16">
            <path fill-rule="evenodd"
                  d="M15 8a.5.5 0 0 1-.5.5H3.707l4.147 4.146a.5.5 0 0 1-.708.708l-5-5a.5.5 0 0 1 0-.708l5-5a.5.5 0 1 1 .708.708L3.707 7.5H14.5A.5.5 0 0 1 15 8z"/>
        </svg>
        Kembali
    </a>
</div>

<main style="max-width: 1000px; margin: 2rem auto; padding: 1rem;">
    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; background: white; padding: 2rem; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
        <div>
            <img src="{{ $product->image_url ?? 'https://via.placeholder.com/400x400?text=No+Image' }}" alt="{{ $product->name }}" style="width: 100%; height: auto; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
        </div>
        
        <div>
            <h1 style="font-size: 1.8rem; font-weight: bold; margin-bottom: 0.5rem;">{{ $product->name }}</h1>
            <p style="font-size: 1.5rem; color: #16a34a; margin: 0.5rem 0;">
                Rp {{ number_format($product->price, 0, ',', '.') }}
            </p>
            <p style="margin-bottom: 1rem; color: #6b7280;">Stok: {{ $product->stock }}</p>
            
            {{-- Baris ini dihilangkan sepenuhnya --}}

            <p style="margin-bottom: 1rem; color: #6b7280;">
                Ditambahkan pada: {{ $product->created_at->format('d M Y') }}
            </p>
            <h3 style="font-weight: 600; margin-bottom: 0.25rem;">Deskripsi</h3>
            <p style="line-height: 1.6; color: #444; margin-bottom: 2rem;">{{ $product->description }}</p>

            <form action="{{ route('cart.store') }}" method="POST" style="margin-top: 2rem;">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <input type="number" name="quantity" value="1" min="1" max="{{ $product->stock }}" style="width: 70px; padding: 0.4rem; margin-right: 1rem; border: 1px solid #ddd; border-radius: 5px;">

                <button type="submit" style="padding: 0.6rem 1.5rem; background-color: #16a34a; color: white; border: none; border-radius: 5px; font-weight: 600; cursor: pointer; transition: background-color 0.3s ease;">
                    + Tambah ke Keranjang
                </button>
            </form>

            <button id="chatSellerBtn" style="margin-top: 1rem; padding: 0.6rem 1.5rem; background-color: #007bff; color: white; border: none; border-radius: 5px; font-weight: 600; cursor: pointer; transition: background-color 0.3s ease;">
                Chat Penjual
            </button>
        </div>
    </div>
</main>

<div id="chatBox" style="display: none; position: fixed; bottom: 20px; right: 20px; width: 350px; height: 500px; background-color: white; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.3); z-index: 1001; display: flex; flex-direction: column;">
    <div style="background-color: #4F9D4D; color: white; padding: 15px; border-radius: 10px 10px 0 0; display: flex; justify-content: space-between; align-items: center;">
        <span style="font-weight: bold;">Chat dengan {{ $product->shop->name ?? 'Penjual' }}</span>
        <button id="closeChatBtn" style="background: none; border: none; color: white; font-size: 1.2rem; cursor: pointer;">&times;</button>
    </div>
    <div id="chatMessages" style="flex-grow: 1; padding: 15px; overflow-y: auto; border-bottom: 1px solid #eee; display: flex; flex-direction: column; gap: 10px;">
        <div style="background-color: #e0e0e0; padding: 8px 12px; border-radius: 8px; align-self: flex-start; max-width: 80%;">
            Halo! Ada yang bisa saya bantu?
        </div>
    </div>
    <div style="padding: 15px; background-color: #f5f5f5;">
        <p style="font-size: 0.9rem; font-weight: bold; margin-bottom: 10px;">Pilih Pertanyaan Cepat:</p>
        <div id="quickQuestions" style="display: flex; flex-wrap: wrap; gap: 8px;">
            <button class="quick-question-btn" data-question="Halo, apakah barang ini masih ada stok?">Stok?</button>
            <button class="quick-question-btn" data-question="Bisa dikirim hari ini?">Kirim Hari Ini?</button>
            <button class="quick-question-btn" data-question="Apakah ini barang ori/asli?">Ori/Asli?</button>
            <button class="quick-question-btn" data-question="Apakah ada garansi untuk produk ini?">Garansi?</button>
            <button class="quick-question-btn" data-question="Bisa COD (Cash on Delivery)?">Bisa COD?</button>
            <button class="quick-question-btn" data-question="Berapa lama estimasi pengiriman ke alamat saya?">Estimasi Pengiriman?</button>
            <button class="quick-question-btn" data-question="Bisa nego harga?">Nego Harga?</button>
            <button class="quick-question-btn" data-question="Apakah ada ukuran/varian lain yang tersedia?">Varian Lain?</button>
            <button class="quick-question-btn" data-question="Bagaimana cara klaim garansi jika ada masalah?">Klaim Garansi?</button>
            <button class="quick-question-btn" data-question="Apakah ada diskon untuk pembelian grosir?">Diskon Grosir?</button>
        </div>
        <div id="loadingIndicator" style="display: none; text-align: center; margin-top: 10px; color: #666;">
            Membalas...
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const chatSellerBtn = document.getElementById('chatSellerBtn');
        const closeChatBtn = document.getElementById('closeChatBtn');
        const chatBox = document.getElementById('chatBox');
        const chatMessages = document.getElementById('chatMessages');
        const quickQuestions = document.getElementById('quickQuestions');
        const loadingIndicator = document.getElementById('loadingIndicator');

        const product = {
            id: "{{ $product->id }}",
            name: "{{ $product->name }}",
            description: "{{ $product->description }}",
            price: {{ $product->price }},
            stock: {{ $product->stock }},
            shopName: "{{ $product->shop->name ?? 'Penjual' }}"
        };

        chatSellerBtn.addEventListener('click', function() {
            chatBox.style.display = 'flex';
        });

        closeChatBtn.addEventListener('click', function() {
            chatBox.style.display = 'none';
        });

        quickQuestions.addEventListener('click', function(event) {
            if (event.target.classList.contains('quick-question-btn')) {
                const question = event.target.dataset.question;
                addMessage(question, 'user');
                sendQuestionToLLM(question, product);
            }
        });

        function addMessage(text, sender) {
            const messageDiv = document.createElement('div');
            messageDiv.style.padding = '8px 12px';
            messageDiv.style.borderRadius = '8px';
            messageDiv.style.maxWidth = '80%';
            messageDiv.style.wordWrap = 'break-word';

            if (sender === 'user') {
                messageDiv.style.backgroundColor = '#dcf8c6';
                messageDiv.style.alignSelf = 'flex-end';
                messageDiv.textContent = text;
            } else {
                messageDiv.style.backgroundColor = '#e0e0e0';
                messageDiv.style.alignSelf = 'flex-start';
                messageDiv.textContent = text;
            }
            chatMessages.appendChild(messageDiv);
            chatMessages.scrollTop = chatMessages.scrollHeight;
        }

        function sendQuestionToLLM(question, productContext) {
            loadingIndicator.style.display = 'none'; 

            let llmResponseText;
            switch (question) {
                case "Halo, apakah barang ini masih ada stok?":
                    llmResponseText = `Halo! Iya, ${productContext.name} masih ada stok sekitar ${productContext.stock} unit. Bisa langsung dibeli saja ya.`;
                    break;
                case "Bisa dikirim hari ini?":
                    llmResponseText = "Jika pesanan masuk sebelum jam 3 sore, kami usahakan pengiriman di hari yang sama. Setelah itu, akan dikirim besok.";
                    break;
                case "Apakah ini barang ori/asli?":
                    llmResponseText = `${productContext.name} yang kami jual dijamin 100% original dan baru. Kami hanya menjual produk asli.`;
                    break;
                case "Apakah ada garansi untuk produk ini?":
                    llmResponseText = `Iya, ${productContext.name} ini bergaransi resmi ${productContext.shopName} selama 1 tahun. Silakan klaim garansi jika ada masalah.`;
                    break;
                case "Bisa COD (Cash on Delivery)?":
                    llmResponseText = "Mohon maaf, saat ini kami belum melayani pembayaran COD. Transaksi hanya melalui metode pembayaran yang tersedia di sistem.";
                    break;
                case "Berapa lama estimasi pengiriman ke alamat saya?":
                    llmResponseText = "Estimasi pengiriman biasanya 2-5 hari kerja tergantung lokasi Anda setelah pembayaran terverifikasi. Anda bisa melacak status pengiriman setelah pesanan diproses.";
                    break;
                case "Bisa nego harga?":
                    llmResponseText = "Harga yang tertera sudah harga pas terbaik untuk kualitas produk ini. Mohon maaf belum bisa nego harga.";
                    break;
                case "Apakah ada ukuran/varian lain yang tersedia?":
                    llmResponseText = `Saat ini ${productContext.name} hanya tersedia dalam varian yang tertera di halaman produk. Jika ada varian baru, akan segera kami update.`;
                    break;
                case "Bagaimana cara klaim garansi jika ada masalah?":
                    llmResponseText = "Untuk klaim garansi, silakan hubungi kami melalui fitur chat ini dengan melampirkan nomor pesanan dan deskripsi masalah. Kami akan pandu prosesnya.";
                    break;
                case "Apakah ada diskon untuk pembelian grosir?":
                    llmResponseText = "Untuk pembelian grosir, silakan chat kami secara pribadi untuk membahas diskon khusus. Kami akan senang membantu Anda.";
                    break;
                default:
                    llmResponseText = "Maaf, saya belum mengerti pertanyaan Anda. Silakan pilih pertanyaan dari daftar atau ajukan pertanyaan lain.";
            }
            
            addMessage(llmResponseText, 'llm');
        }
    });
</script>
@endsection
