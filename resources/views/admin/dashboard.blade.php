<!DOCTYPE html>
<html lang="sw">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | B-Tech CardSys</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <style> 
        body { font-family: 'Outfit', sans-serif; background-color: #f8fafc; }
        .glass-header { background: rgba(255, 255, 255, 0.85); backdrop-filter: blur(12px); }
        
        /* LANGUAGE SWITCHER LOGIC */
        body.lang-en-active .lang-sw { display: none !important; }
        body.lang-sw-active .lang-en { display: none !important; }
        
        /* MODAL ANIMATION */
        .modal-enter { animation: modalFadeIn 0.3s ease-out forwards; }
        @keyframes modalFadeIn {
            from { opacity: 0; transform: scale(0.95) translateY(-20px); }
            to { opacity: 1; transform: scale(1) translateY(0); }
        }
        
        /* Custom Scrollbar */
        .custom-scrollbar::-webkit-scrollbar { width: 6px; }
        .custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }
    </style>
</head>
<body class="flex min-h-screen text-slate-800 lang-sw-active">

    <aside class="w-[280px] bg-[#0B1120] text-slate-300 hidden lg:flex flex-col sticky top-0 h-screen border-r border-slate-800">
        <div class="p-8 flex items-center space-x-4">
            <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-xl flex items-center justify-center text-white shadow-lg shadow-blue-500/30">
                <i class="fas fa-layer-group text-lg"></i>
            </div>
            <div>
                <h1 class="text-xl font-extrabold text-white tracking-tight">CardSys</h1>
                <p class="text-[10px] text-blue-400 font-bold uppercase tracking-widest">B-Tech Group</p>
            </div>
        </div>
        
        <nav class="flex-1 px-4 space-y-2 mt-4">
            <p class="px-4 text-[10px] font-black uppercase text-slate-500 tracking-widest mb-4">
                <span class="lang-sw">Menyu Kuu</span><span class="lang-en">Main Menu</span>
            </p>
            
            <a href="/admin" class="flex items-center space-x-3 px-4 py-3.5 bg-blue-600 text-white rounded-2xl shadow-lg shadow-blue-600/20">
                <i class="fas fa-home w-5 text-center"></i>
                <span class="font-bold text-sm">Dashboard</span>
            </a>
            
            @if(isset(Auth::user()->role) && Auth::user()->role === 'super_admin')
            <a href="/admin/clients" class="flex items-center space-x-3 px-4 py-3.5 text-slate-400 hover:text-white hover:bg-slate-800 rounded-2xl transition-all">
                <i class="fas fa-building w-5 text-center"></i>
                <span class="font-semibold text-sm"><span class="lang-sw">Wateja / Makampuni</span><span class="lang-en">Clients</span></span>
            </a>
            @endif

            <a href="#" class="flex items-center space-x-3 px-4 py-3.5 text-slate-400 hover:text-white hover:bg-slate-800 rounded-2xl transition-all">
                <i class="fas fa-cog w-5 text-center"></i>
                <span class="font-semibold text-sm"><span class="lang-sw">Mipangilio (Settings)</span><span class="lang-en">Settings</span></span>
            </a>
        </nav>

        <div class="p-4 m-4 bg-[#111827] border border-slate-800 rounded-3xl">
            <div class="flex items-center space-x-3 p-2">
                <div class="w-10 h-10 rounded-full bg-slate-700 flex items-center justify-center text-white font-bold border border-slate-600">
                    {{ substr(Auth::user()->name ?? 'B', 0, 1) }}
                </div>
                <div class="flex-1 overflow-hidden">
                    <p class="text-sm font-bold text-white truncate">{{ Auth::user()->name ?? 'Admin' }}</p>
                    <p class="text-[10px] text-emerald-400 uppercase tracking-widest font-bold">
                        {{ Auth::user()->role === 'super_admin' ? 'Super Admin' : 'Active Client' }}
                    </p>
                </div>
            </div>
            <form action="{{ route('logout') ?? '/logout' }}" method="POST" class="mt-2">
                @csrf
                <button type="submit" class="w-full py-2.5 bg-red-500/10 hover:bg-red-500 text-red-500 hover:text-white rounded-xl text-xs font-bold transition-all flex items-center justify-center space-x-2">
                    <i class="fas fa-sign-out-alt"></i> 
                    <span class="lang-sw">Toka (Logout)</span><span class="lang-en">Logout</span>
                </button>
            </form>
        </div>
    </aside>

    <main class="flex-1 flex flex-col min-w-0">
        
        <header class="h-24 glass-header border-b border-slate-200 flex items-center justify-between px-6 lg:px-12 sticky top-0 z-30">
            <div>
                <h2 class="text-2xl font-extrabold text-slate-900">
                    <span class="lang-sw">Kadi za Kidijitali</span><span class="lang-en">Digital Cards</span>
                </h2>
            </div>
            
            <div class="flex items-center space-x-4">
                <button onclick="toggleLanguage()" class="lang-toggle-btn bg-white border border-slate-200 text-slate-600 hover:bg-slate-50 px-3 py-2 rounded-xl text-xs font-bold shadow-sm transition-all">
                    <i class="fas fa-globe mr-1"></i> EN
                </button>

                <button onclick="toggleModal()" class="bg-slate-900 hover:bg-blue-600 text-white px-6 py-3.5 rounded-2xl font-bold text-sm transition-all flex items-center shadow-xl">
                    <i class="fas fa-plus mr-2"></i> 
                    <span class="lang-sw">Tengeneza Kadi</span><span class="lang-en">New Card</span>
                </button>
            </div>
        </header>

        <div class="p-6 lg:p-12 overflow-y-auto">
            
            @if($errors->any())
                <div class="mb-8 p-5 bg-red-50 border border-red-200 text-red-700 rounded-2xl shadow-sm">
                    <div class="flex items-center mb-2">
                        <i class="fas fa-exclamation-triangle mr-2 text-red-500 text-lg"></i>
                        <span class="font-bold text-sm"><span class="lang-sw">Kuna makosa kwenye fomu yako:</span><span class="lang-en">There are errors in your form:</span></span>
                    </div>
                    <ul class="list-disc pl-8 text-xs font-semibold space-y-1">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(session('success'))
                <div class="mb-8 p-5 bg-emerald-50 border border-emerald-100 text-emerald-700 rounded-2xl flex items-center shadow-sm">
                    <i class="fas fa-check-circle mr-3 text-emerald-500 text-xl"></i>
                    <span class="font-bold">{{ session('success') }}</span>
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
                <div class="bg-white p-6 rounded-[2rem] border border-slate-100 shadow-sm flex items-center justify-between">
                    <div>
                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1">
                            <span class="lang-sw">Jumla ya Kadi</span><span class="lang-en">Total Cards</span>
                        </p>
                        <h4 class="text-3xl font-black text-slate-800">{{ isset($cards) ? $cards->count() : 0 }}</h4>
                    </div>
                    <div class="w-14 h-14 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center text-2xl"><i class="fas fa-id-card"></i></div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">
                @if(isset($cards))
                    @forelse($cards as $card)
                        <div class="bg-white rounded-[2.5rem] border border-slate-100 shadow-sm hover:shadow-2xl hover:border-blue-100 transition-all duration-300 overflow-hidden group flex flex-col">
                            <div class="h-28 w-full relative" style="background: linear-gradient(135deg, {{ $card->color }}, #1e293b);">
                                <span class="absolute top-4 right-4 bg-white/20 backdrop-blur-md text-white text-[9px] font-black uppercase tracking-widest px-3 py-1 rounded-full border border-white/30 shadow-sm">
                                    {{ $card->template === 'business_card' ? 'Biz Card' : 'ID Badge' }}
                                </span>
                            </div>
                            <div class="px-8 pb-8 flex-1 flex flex-col relative">
                                <div class="w-20 h-20 -mt-10 bg-white rounded-full p-1 shadow-lg border-2 border-slate-50 relative z-10 mx-auto">
                                    <img src="{{ $card->image ? asset('storage/' . $card->image) : 'https://ui-avatars.com/api/?name='.urlencode($card->name).'&background=random' }}" class="w-full h-full rounded-full object-cover">
                                </div>
                                <div class="text-center mt-4 mb-6 flex-1">
                                    <h3 class="text-xl font-extrabold text-slate-900">{{ $card->name }}</h3>
                                    <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mt-1">{{ $card->title ?? 'Profile' }}</p>
                                    <p class="text-[10px] text-blue-500 font-bold mt-2 bg-blue-50 inline-block px-3 py-1 rounded-lg">ID: {{ $card->slug }}</p>
                                </div>
                                <div class="grid grid-cols-4 gap-3 border-t border-slate-100 pt-6">
                                    <a href="/{{ $card->slug }}" target="_blank" class="col-span-3 flex items-center justify-center bg-slate-50 text-blue-600 hover:bg-blue-600 hover:text-white font-bold py-3 rounded-2xl text-xs border border-slate-100 transition-all">
                                        <i class="fas fa-eye mr-2"></i> <span class="lang-sw">ONA KADI</span><span class="lang-en">VIEW LIVE</span>
                                    </a>
                                    
                                    <form action="/cards/{{ $card->id }}" method="POST" class="col-span-1">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Una uhakika unataka kufuta kadi hii moja kwa moja?')" class="w-full h-full flex items-center justify-center bg-red-50 hover:bg-red-500 hover:text-white text-red-500 py-3 rounded-2xl border border-red-100 transition-all">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full py-24 flex flex-col items-center justify-center bg-white rounded-[3rem] border-2 border-dashed border-slate-200">
                            <div class="w-24 h-24 bg-blue-50 text-blue-500 rounded-full flex items-center justify-center text-4xl mb-6 shadow-inner"><i class="fas fa-wallet"></i></div>
                            <h3 class="text-slate-800 font-extrabold text-xl mb-2">
                                <span class="lang-sw">Hujatengeneza Kadi Yoyote</span><span class="lang-en">No Cards Created Yet</span>
                            </h3>
                            <p class="text-slate-400 text-sm font-medium mb-6 text-center max-w-sm">
                                <span class="lang-sw">Bonyeza "Tengeneza Kadi" kuanza.</span>
                                <span class="lang-en">Click "New Card" to get started.</span>
                            </p>
                        </div>
                    @endforelse
                @endif
            </div>
        </div>
    </main>

    <div id="modal-overlay" class="fixed inset-0 bg-slate-900/80 backdrop-blur-sm hidden z-50 flex items-center justify-center p-4 transition-all" onclick="closeModalOnOutsideClick(event)">
        
        <div id="modal-content" class="bg-white w-full max-w-2xl rounded-[2.5rem] shadow-2xl flex flex-col max-h-[90vh] overflow-hidden">
            
            <div class="p-6 px-8 border-b border-slate-100 flex justify-between items-center bg-slate-50/50">
                <div>
                    <h3 class="text-2xl font-extrabold text-slate-900"><span class="lang-sw">Kadi Mpya</span><span class="lang-en">New Card</span></h3>
                    <p class="text-xs font-bold text-slate-400 mt-1 uppercase tracking-widest"><span class="lang-sw">Jaza taarifa kwa usahihi</span><span class="lang-en">Fill details correctly</span></p>
                </div>
                <button onclick="toggleModal()" class="w-10 h-10 flex items-center justify-center bg-white border border-slate-200 text-slate-400 rounded-full hover:bg-slate-100 hover:text-red-500 transition-all shadow-sm">
                    <i class="fas fa-times text-lg"></i>
                </button>
            </div>
            
            <div class="p-8 overflow-y-auto custom-scrollbar">
                <form action="/cards" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    
                    <div class="grid grid-cols-2 gap-6">
                        <div>
                            <label class="text-[10px] font-black uppercase text-slate-400 tracking-widest mb-2 block">
                                <span class="lang-sw">Aina ya Kadi</span><span class="lang-en">Card Type</span>
                            </label>
                            <select name="type" id="card-type" onchange="generateCompanyID()" class="w-full bg-slate-50 border border-slate-200 rounded-2xl p-4 text-sm font-bold focus:ring-2 focus:ring-blue-500 outline-none transition-all">
                                <option value="individual">Mtu Binafsi (Individual)</option>
                                <option value="institution">Taasisi / Kampuni (Company)</option>
                            </select>
                        </div>
                        <div>
                            <label class="text-[10px] font-black uppercase text-blue-500 tracking-widest mb-2 block">
                                <span class="lang-sw">ID Namba / Slug</span><span class="lang-en">ID Number / Slug</span>
                            </label>
                            <input type="text" name="slug" id="card-slug" placeholder="mf. jina-lako" class="w-full bg-slate-50 border border-blue-200 rounded-2xl p-4 text-sm font-bold focus:ring-2 focus:ring-blue-500 outline-none transition-all" required>
                        </div>
                    </div>

                    <div class="mt-4">
                        <label class="text-[10px] font-black uppercase text-slate-400 tracking-widest mb-3 block">
                            <span class="lang-sw">Muonekano wa Kadi (Template)</span><span class="lang-en">Card Design Template</span>
                        </label>
                        <div class="grid grid-cols-2 gap-4">
                            <label class="cursor-pointer">
                                <input type="radio" name="template" value="business_card" class="peer sr-only" checked>
                                <div class="p-4 border-2 border-slate-200 rounded-2xl peer-checked:border-blue-500 peer-checked:bg-blue-50 transition-all text-center hover:bg-slate-50">
                                    <i class="fas fa-id-card text-2xl mb-2 text-slate-400 peer-checked:text-blue-500"></i>
                                    <p class="text-xs font-bold text-slate-600"><span class="lang-sw">Kadi ya Biashara</span><span class="lang-en">Business Card</span></p>
                                    <p class="text-[9px] text-slate-400 font-bold uppercase mt-1">Landscape</p>
                                </div>
                            </label>
                            <label class="cursor-pointer">
                                <input type="radio" name="template" value="id_badge" class="peer sr-only">
                                <div class="p-4 border-2 border-slate-200 rounded-2xl peer-checked:border-blue-500 peer-checked:bg-blue-50 transition-all text-center hover:bg-slate-50">
                                    <i class="fas fa-portrait text-2xl mb-2 text-slate-400 peer-checked:text-blue-500"></i>
                                    <p class="text-xs font-bold text-slate-600"><span class="lang-sw">Kitambulisho</span><span class="lang-en">ID Badge</span></p>
                                    <p class="text-[9px] text-slate-400 font-bold uppercase mt-1">Portrait</p>
                                </div>
                            </label>
                        </div>
                    </div>

                    <div>
                        <label class="text-[10px] font-black uppercase text-slate-400 tracking-widest mb-2 block">
                            <span class="lang-sw">Jina Kamili au la Kampuni</span><span class="lang-en">Full Name or Company Name</span>
                        </label>
                        <input type="text" name="name" class="w-full bg-slate-50 border border-slate-200 rounded-2xl p-4 text-sm font-bold focus:ring-2 focus:ring-blue-500 outline-none transition-all" required>
                    </div>

                    <div class="grid grid-cols-2 gap-6">
                        <div>
                            <label class="text-[10px] font-black uppercase text-slate-400 tracking-widest mb-2 block">Cheo / Slogan</label>
                            <input type="text" name="title" class="w-full bg-slate-50 border border-slate-200 rounded-2xl p-4 text-sm font-bold focus:ring-2 focus:ring-blue-500 outline-none">
                        </div>
                        <div>
                            <label class="text-[10px] font-black uppercase text-slate-400 tracking-widest mb-2 block">Theme Color</label>
                            <input type="color" name="color" value="#0B1120" class="w-full h-[54px] bg-slate-50 border border-slate-200 rounded-2xl p-1 cursor-pointer">
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-6">
                        <div>
                            <label class="text-[10px] font-black uppercase text-slate-400 tracking-widest mb-2 block">WhatsApp Namba</label>
                            <input type="text" name="phone" placeholder="255..." class="w-full bg-slate-50 border border-slate-200 rounded-2xl p-4 text-sm font-bold focus:ring-2 focus:ring-blue-500 outline-none">
                        </div>
                        <div>
                            <label class="text-[10px] font-black uppercase text-slate-400 tracking-widest mb-2 block">Barua Pepe (Email)</label>
                            <input type="email" name="email" class="w-full bg-slate-50 border border-slate-200 rounded-2xl p-4 text-sm font-bold focus:ring-2 focus:ring-blue-500 outline-none">
                        </div>
                    </div>

                    <div>
                        <label class="text-[10px] font-black uppercase text-slate-400 tracking-widest mb-2 block">Picha / Logo</label>
                        <input type="file" name="image" class="w-full bg-white border border-slate-200 rounded-2xl p-3 text-sm font-medium text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-blue-50 file:text-blue-700">
                    </div>

                    <div class="bg-slate-50 p-5 rounded-2xl border border-slate-200 space-y-3">
                        <p class="text-[10px] font-black uppercase text-slate-500 tracking-widest">Social Media Usernames</p>
                        <div class="grid grid-cols-3 gap-3">
                            <input type="text" name="instagram" placeholder="Insta" class="w-full bg-white border border-slate-200 rounded-xl p-3 text-xs font-bold outline-none">
                            <input type="text" name="linkedin" placeholder="LinkedIn" class="w-full bg-white border border-slate-200 rounded-xl p-3 text-xs font-bold outline-none">
                            <input type="text" name="tiktok" placeholder="TikTok" class="w-full bg-white border border-slate-200 rounded-xl p-3 text-xs font-bold outline-none">
                        </div>
                    </div>

                    <button type="submit" class="w-full bg-slate-900 hover:bg-blue-600 text-white font-black py-4 rounded-2xl shadow-xl transition-all uppercase tracking-widest text-sm flex items-center justify-center mt-4">
                        <i class="fas fa-save mr-2"></i> <span class="lang-sw">Hifadhi Kadi</span><span class="lang-en">Save Card</span>
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Language Toggle Logic
        function toggleLanguage() {
            const isEn = document.body.classList.contains('lang-en-active');
            const newLang = isEn ? 'sw' : 'en';
            localStorage.setItem('cardsys_lang', newLang);
            applyLang(newLang);
        }

        function applyLang(lang) {
            if(lang === 'en') {
                document.body.classList.remove('lang-sw-active');
                document.body.classList.add('lang-en-active');
            } else {
                document.body.classList.remove('lang-en-active');
                document.body.classList.add('lang-sw-active');
            }
            document.querySelectorAll('.lang-toggle-btn').forEach(btn => {
                btn.innerHTML = lang === 'en' ? '<i class="fas fa-globe mr-1"></i> SW' : '<i class="fas fa-globe mr-1"></i> EN';
            });
        }

        document.addEventListener('DOMContentLoaded', () => {
            applyLang(localStorage.getItem('cardsys_lang') || 'sw');
        });

        // Centered Modal Logic
        const modalOverlay = document.getElementById('modal-overlay');
        const modalContent = document.getElementById('modal-content');

        function toggleModal() {
            if (modalOverlay.classList.contains('hidden')) {
                modalOverlay.classList.remove('hidden');
                modalContent.classList.add('modal-enter');
            } else {
                modalOverlay.classList.add('hidden');
                modalContent.classList.remove('modal-enter');
            }
        }

        function closeModalOnOutsideClick(event) {
            if (event.target === modalOverlay) {
                toggleModal();
            }
        }

        // Auto Generate Company ID
        function generateCompanyID() {
            const type = document.getElementById('card-type').value;
            const slugInput = document.getElementById('card-slug');
            
            if (type === 'institution') {
                const randomNum = Math.floor(100000 + Math.random() * 900000);
                slugInput.value = 'CMP-' + randomNum;
            } else {
                slugInput.value = '';
            }
        }
    </script>
</body>
</html>