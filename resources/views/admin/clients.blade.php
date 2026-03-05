<!DOCTYPE html>
<html lang="sw">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wateja | B-Tech CardSys</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <style> 
        body { font-family: 'Outfit', sans-serif; background-color: #f8fafc; }
        .glass-header { background: rgba(255, 255, 255, 0.85); backdrop-filter: blur(12px); }
        body.lang-en-active .lang-sw { display: none !important; }
        body.lang-sw-active .lang-en { display: none !important; }
        .modal-enter { animation: modalFadeIn 0.3s ease-out forwards; }
        @keyframes modalFadeIn { from { opacity: 0; transform: scale(0.95) translateY(-20px); } to { opacity: 1; transform: scale(1) translateY(0); } }
    </style>
</head>
<body class="flex min-h-screen text-slate-800 lang-sw-active">

    <aside class="w-[280px] bg-[#0B1120] text-slate-300 hidden lg:flex flex-col sticky top-0 h-screen border-r border-slate-800">
        <div class="p-8 flex items-center space-x-4">
            <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-xl flex items-center justify-center text-white shadow-lg">
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
            <a href="/admin" class="flex items-center space-x-3 px-4 py-3.5 text-slate-400 hover:text-white hover:bg-slate-800 rounded-2xl transition-all">
                <i class="fas fa-home w-5 text-center"></i><span class="font-semibold text-sm">Dashboard</span>
            </a>
            
            <a href="/admin/clients" class="flex items-center space-x-3 px-4 py-3.5 bg-blue-600 text-white rounded-2xl shadow-lg shadow-blue-600/20">
                <i class="fas fa-building w-5 text-center"></i>
                <span class="font-bold text-sm"><span class="lang-sw">Wateja / Makampuni</span><span class="lang-en">Clients</span></span>
            </a>
        </nav>

        <div class="p-4 m-4 bg-[#111827] border border-slate-800 rounded-3xl">
            <div class="flex items-center space-x-3 p-2">
                <div class="w-10 h-10 rounded-full bg-slate-700 flex items-center justify-center text-white font-bold">{{ substr(Auth::user()->name ?? 'B', 0, 1) }}</div>
                <div class="flex-1 overflow-hidden">
                    <p class="text-sm font-bold text-white truncate">{{ Auth::user()->name }}</p>
                    <p class="text-[10px] text-emerald-400 uppercase tracking-widest font-bold">Super Admin</p>
                </div>
            </div>
            <form action="/logout" method="POST" class="mt-2">
                @csrf
                <button type="submit" class="w-full py-2.5 bg-red-500/10 hover:bg-red-500 text-red-500 hover:text-white rounded-xl text-xs font-bold transition-all flex items-center justify-center space-x-2">
                    <i class="fas fa-sign-out-alt"></i> <span class="lang-sw">Toka</span><span class="lang-en">Logout</span>
                </button>
            </form>
        </div>
    </aside>

    <main class="flex-1 flex flex-col min-w-0">
        <header class="h-24 glass-header border-b border-slate-200 flex items-center justify-between px-6 lg:px-12 sticky top-0 z-30">
            <div>
                <h2 class="text-2xl font-extrabold text-slate-900">
                    <span class="lang-sw">Usimamizi wa Wateja</span><span class="lang-en">Client Management</span>
                </h2>
                <p class="text-sm text-slate-500 font-medium mt-1"><span class="lang-sw">Sajili makampuni yatakayotumia mfumo.</span><span class="lang-en">Register companies using the system.</span></p>
            </div>
            <div class="flex items-center space-x-4">
                <button onclick="toggleLanguage()" class="lang-toggle-btn bg-white border border-slate-200 text-slate-600 hover:bg-slate-50 px-3 py-2 rounded-xl text-xs font-bold shadow-sm transition-all"><i class="fas fa-globe mr-1"></i> EN</button>
                <button onclick="toggleModal()" class="bg-slate-900 hover:bg-blue-600 text-white px-6 py-3.5 rounded-2xl font-bold text-sm transition-all flex items-center shadow-xl">
                    <i class="fas fa-plus mr-2"></i> <span class="lang-sw">Sajili Mteja</span><span class="lang-en">New Client</span>
                </button>
            </div>
        </header>

        <div class="p-6 lg:p-12 overflow-y-auto">
            
            @if($errors->any())
                <div class="mb-8 p-5 bg-red-50 border border-red-200 text-red-700 rounded-2xl shadow-sm">
                    <ul class="list-disc pl-5 text-xs font-semibold">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
                </div>
            @endif
            @if(session('success'))
                <div class="mb-8 p-5 bg-emerald-50 border border-emerald-100 text-emerald-700 rounded-2xl flex items-center shadow-sm">
                    <i class="fas fa-check-circle mr-3 text-emerald-500 text-xl"></i><span class="font-bold">{{ session('success') }}</span>
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
                @forelse($clients as $client)
                    <div class="bg-white p-6 rounded-[2rem] border border-slate-100 shadow-sm hover:shadow-xl transition-all relative overflow-hidden">
                        <div class="absolute top-0 left-0 w-full h-2 bg-blue-500"></div>
                        
                        <div class="flex items-center justify-between mb-6 mt-2">
                            <div class="w-14 h-14 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center text-xl font-black">
                                {{ substr($client->name, 0, 1) }}
                            </div>
                            <form action="/admin/clients/{{ $client->id }}" method="POST">
                                @csrf @method('DELETE')
                                <button type="submit" onclick="return confirm('WARNING: Kufuta akaunti hii kutafuta kadi zao zote pia! Uko uhakika?')" class="w-10 h-10 bg-red-50 text-red-400 hover:bg-red-500 hover:text-white rounded-xl flex items-center justify-center transition-all">
                                    <i class="fas fa-trash-alt text-sm"></i>
                                </button>
                            </form>
                        </div>
                        
                        <h3 class="text-xl font-extrabold text-slate-800">{{ $client->name }}</h3>
                        <div class="mt-4 space-y-2">
                            <p class="text-sm font-semibold text-slate-500 flex items-center"><i class="fas fa-envelope w-5 text-slate-400"></i> {{ $client->email }}</p>
                            <p class="text-xs font-bold text-slate-400 flex items-center"><i class="fas fa-clock w-5"></i> Alijiunga: {{ $client->created_at->format('d M Y') }}</p>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-20 text-center bg-white rounded-[3rem] border-2 border-dashed border-slate-200">
                        <p class="text-slate-400 font-bold uppercase tracking-widest"><span class="lang-sw">Hakuna wateja waliosajiliwa bado.</span><span class="lang-en">No clients registered yet.</span></p>
                    </div>
                @endforelse
            </div>
        </div>
    </main>

    <div id="modal-overlay" class="fixed inset-0 bg-slate-900/80 backdrop-blur-sm hidden z-50 flex items-center justify-center p-4" onclick="closeModalOnOutsideClick(event)">
        <div id="modal-content" class="bg-white w-full max-w-md rounded-[2.5rem] shadow-2xl overflow-hidden">
            <div class="p-6 px-8 border-b border-slate-100 flex justify-between items-center bg-slate-50">
                <h3 class="text-xl font-extrabold text-slate-900"><span class="lang-sw">Sajili Akaunti Mpya</span><span class="lang-en">Register New Client</span></h3>
                <button onclick="toggleModal()" class="text-slate-400 hover:text-red-500 transition-all"><i class="fas fa-times text-lg"></i></button>
            </div>
            
            <form action="/admin/clients" method="POST" class="p-8 space-y-5">
                @csrf
                <div>
                    <label class="text-[10px] font-black uppercase text-slate-400 tracking-widest mb-2 block">Jina la Kampuni / Mteja</label>
                    <input type="text" name="name" class="w-full bg-slate-50 border border-slate-200 rounded-2xl p-4 text-sm font-bold focus:ring-2 focus:ring-blue-500 outline-none" required>
                </div>
                <div>
                    <label class="text-[10px] font-black uppercase text-slate-400 tracking-widest mb-2 block">Barua Pepe (Email ya Kulogin)</label>
                    <input type="email" name="email" class="w-full bg-slate-50 border border-slate-200 rounded-2xl p-4 text-sm font-bold focus:ring-2 focus:ring-blue-500 outline-none" required>
                </div>
                <div>
                    <label class="text-[10px] font-black uppercase text-slate-400 tracking-widest mb-2 block">Nenosiri (Password)</label>
                    <input type="password" name="password" class="w-full bg-slate-50 border border-slate-200 rounded-2xl p-4 text-sm font-bold focus:ring-2 focus:ring-blue-500 outline-none" required>
                </div>

                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-black py-4 rounded-2xl shadow-xl transition-all uppercase tracking-widest text-sm mt-4">
                    <span class="lang-sw">Tengeneza Akaunti</span><span class="lang-en">Create Account</span>
                </button>
            </form>
        </div>
    </div>

    <script>
        function toggleLanguage() {
            const isEn = document.body.classList.contains('lang-en-active');
            const newLang = isEn ? 'sw' : 'en';
            localStorage.setItem('cardsys_lang', newLang);
            applyLang(newLang);
        }
        function applyLang(lang) {
            if(lang === 'en') { document.body.classList.remove('lang-sw-active'); document.body.classList.add('lang-en-active'); }
            else { document.body.classList.remove('lang-en-active'); document.body.classList.add('lang-sw-active'); }
            document.querySelectorAll('.lang-toggle-btn').forEach(btn => btn.innerHTML = lang === 'en' ? '<i class="fas fa-globe mr-1"></i> SW' : '<i class="fas fa-globe mr-1"></i> EN');
        }
        document.addEventListener('DOMContentLoaded', () => applyLang(localStorage.getItem('cardsys_lang') || 'sw'));

        const modalOverlay = document.getElementById('modal-overlay');
        const modalContent = document.getElementById('modal-content');
        function toggleModal() {
            if (modalOverlay.classList.contains('hidden')) { modalOverlay.classList.remove('hidden'); modalContent.classList.add('modal-enter'); }
            else { modalOverlay.classList.add('hidden'); modalContent.classList.remove('modal-enter'); }
        }
        function closeModalOnOutsideClick(event) { if (event.target === modalOverlay) toggleModal(); }
    </script>
</body>
</html>