<!DOCTYPE html>
<html lang="sw">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $card->name }} | Smart Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Outfit', sans-serif; background-color: #e2e8f0; }
        
        /* Shape za kisasa kwenye Business Card kama picha yako */
        .shape-top-right { clip-path: polygon(100% 0, 100% 100%, 0 0); }
        .shape-bottom-right { clip-path: polygon(100% 0, 100% 100%, 25% 100%); }
        .shape-bottom-left { clip-path: polygon(0 0, 0% 100%, 100% 100%); }
    </style>
</head>
<body class="flex flex-col items-center justify-center min-h-screen p-4 sm:p-8">

    @if($card->type === 'individual')
        <div class="relative w-full max-w-[650px] bg-white rounded-2xl shadow-2xl overflow-hidden flex flex-col sm:flex-row min-h-[340px]">
            
            <div class="absolute top-0 right-0 w-32 h-40 opacity-90 z-0 shape-top-right" style="background-color: {{ $card->color }}"></div>
            <div class="absolute bottom-0 right-0 w-48 h-24 bg-slate-800 z-0 shape-bottom-right"></div>
            <div class="absolute bottom-0 right-8 w-40 h-20 opacity-90 z-0 shape-bottom-right" style="background-color: {{ $card->color }}"></div>
            <div class="absolute bottom-0 left-0 w-24 h-24 opacity-90 z-0 shape-bottom-left hidden sm:block" style="background-color: {{ $card->color }}"></div>

            <div class="w-full sm:w-[35%] p-6 flex flex-col items-center justify-center border-b sm:border-b-0 sm:border-r-2 border-slate-100 z-10 bg-white/50 backdrop-blur-sm">
                <div class="w-20 h-20 mb-3 bg-white rounded-xl shadow-md p-1 border border-slate-100">
                    <img src="{{ $card->image ? asset('storage/' . $card->image) : 'https://ui-avatars.com/api/?name='.urlencode($card->name) }}" class="w-full h-full object-contain rounded-lg">
                </div>
                <h2 class="font-black text-lg text-slate-800 tracking-tight text-center uppercase leading-none">CARD<span style="color: {{ $card->color }}">SYS</span></h2>
                <p class="text-[9px] text-slate-400 font-bold uppercase tracking-[0.2em] text-center mb-6 mt-1 line-through decoration-slate-300">TAGLINE</p>

                <div class="bg-slate-50 p-2 rounded-xl shadow-inner border border-slate-200">
                    <div id="qrcode-biz" class="w-20 h-20"></div>
                </div>
                <p class="text-[8px] font-black text-slate-400 uppercase tracking-widest mt-2">Scan Me</p>
            </div>

            <div class="w-full sm:w-[65%] p-8 sm:pl-10 flex flex-col justify-center z-10 bg-white/80 backdrop-blur-sm">
                <div class="mb-6">
                    <h1 class="text-3xl sm:text-4xl font-black text-slate-800 uppercase tracking-tighter leading-none">{{ $card->name }}</h1>
                    <p class="text-sm font-bold uppercase tracking-widest mt-2" style="color: {{ $card->color }}">{{ $card->title ?? 'Professional Profile' }}</p>
                    <div class="w-16 h-1 mt-3 rounded-full" style="background-color: {{ $card->color }}"></div>
                </div>

                <div class="space-y-3">
                    @if($card->phone)
                    <div class="flex items-center space-x-4">
                        <div class="w-8 h-8 rounded-full flex items-center justify-center text-white text-xs shadow-md" style="background-color: {{ $card->color }}">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <span class="text-sm font-bold text-slate-600">{{ $card->phone }}</span>
                    </div>
                    @endif
                    
                    @if($card->email)
                    <div class="flex items-center space-x-4">
                        <div class="w-8 h-8 rounded-full flex items-center justify-center text-white text-xs shadow-md" style="background-color: {{ $card->color }}">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <span class="text-sm font-bold text-slate-600">{{ $card->email }}</span>
                    </div>
                    @endif

                    <div class="flex items-center space-x-4">
                        <div class="w-8 h-8 rounded-full flex items-center justify-center text-white text-xs shadow-md" style="background-color: {{ $card->color }}">
                            <i class="fas fa-globe"></i>
                        </div>
                        <span class="text-sm font-bold text-slate-600">www.cardsys.info</span>
                    </div>
                </div>
            </div>
        </div>

    @else
        <div class="relative w-full max-w-[320px] bg-white rounded-2xl shadow-2xl overflow-hidden flex flex-col items-center text-center pb-8 border border-slate-200">
            <div class="absolute top-4 w-14 h-3 bg-slate-200/80 backdrop-blur-md rounded-full z-20 shadow-inner border border-slate-300"></div>

            <div class="w-full h-32 relative flex items-start justify-center pt-8" style="background-color: {{ $card->color }}">
                <h2 class="text-white/80 font-black text-xl tracking-widest uppercase opacity-50">STAFF ID</h2>
            </div>

            <div class="w-28 h-28 -mt-14 rounded-full border-4 border-white bg-white shadow-xl overflow-hidden relative z-10">
                <img src="{{ $card->image ? asset('storage/' . $card->image) : 'https://ui-avatars.com/api/?name='.urlencode($card->name) }}" class="w-full h-full object-cover">
            </div>

            <div class="px-6 mt-4 w-full">
                <h1 class="text-2xl font-black text-slate-800 uppercase leading-none">{{ $card->name }}</h1>
                <p class="text-xs font-bold uppercase tracking-widest mt-1" style="color: {{ $card->color }}">{{ $card->title ?? 'Employee' }}</p>

                <div class="mt-4 bg-slate-50 border border-slate-100 px-3 py-2 rounded-lg inline-block">
                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">ID Namba</p>
                    <p class="text-sm font-bold text-slate-800">{{ strtoupper($card->slug) }}</p>
                </div>
            </div>

            <div class="w-32 h-32 mt-6 p-2 bg-white border border-slate-200 rounded-xl shadow-sm flex items-center justify-center">
                <div id="qrcode-id" class="w-full h-full"></div>
            </div>
            <p class="text-[9px] font-bold text-slate-400 uppercase tracking-widest mt-2">Scan to Verify</p>
        </div>
    @endif


    <div class="w-full max-w-[650px] mt-8 space-y-4">
        
        <a href="/vcard/{{ $card->slug }}" class="w-full flex items-center justify-center space-x-3 py-4 rounded-xl text-white font-black text-sm shadow-lg hover:opacity-90 transition transform hover:-translate-y-1" style="background-color: {{ $card->color }}">
            <i class="fas fa-address-book text-lg"></i>
            <span>SAVE TO CONTACTS</span>
        </a>

        <div class="flex justify-center space-x-3">
            @if($card->phone)
            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $card->phone) }}" class="flex-1 bg-white hover:bg-green-50 text-green-500 py-3 rounded-xl flex items-center justify-center shadow-sm border border-slate-200 transition text-lg">
                <i class="fab fa-whatsapp"></i>
            </a>
            @endif
            @if($card->instagram)
            <a href="https://instagram.com/{{ $card->instagram }}" class="flex-1 bg-white hover:bg-pink-50 text-pink-600 py-3 rounded-xl flex items-center justify-center shadow-sm border border-slate-200 transition text-lg">
                <i class="fab fa-instagram"></i>
            </a>
            @endif
            @if($card->linkedin)
            <a href="https://linkedin.com/in/{{ $card->linkedin }}" class="flex-1 bg-white hover:bg-blue-50 text-[#0A66C2] py-3 rounded-xl flex items-center justify-center shadow-sm border border-slate-200 transition text-lg">
                <i class="fab fa-linkedin-in"></i>
            </a>
            @endif
            <button onclick="navigator.share({ title: '{{ $card->name }}', url: window.location.href })" class="flex-1 bg-slate-800 hover:bg-slate-700 text-white py-3 rounded-xl flex items-center justify-center shadow-sm transition text-lg">
                <i class="fas fa-share-alt"></i>
            </button>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
    <script>
        const qrColor = "{{ $card->color }}";
        const url = window.location.href;

        // Angalia ni design gani ipo hewani ndio uchore QR Code
        if(document.getElementById("qrcode-biz")) {
            new QRCode(document.getElementById("qrcode-biz"), { text: url, width: 80, height: 80, colorDark: qrColor, correctLevel: QRCode.CorrectLevel.H });
        }
        if(document.getElementById("qrcode-id")) {
            new QRCode(document.getElementById("qrcode-id"), { text: url, width: 110, height: 110, colorDark: qrColor, correctLevel: QRCode.CorrectLevel.H });
        }
    </script>
</body>
</html>