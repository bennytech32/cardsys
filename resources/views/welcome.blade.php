<!DOCTYPE html>
<html lang="sw" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CardSys Pro | The Ultimate Digital Business Card</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Outfit', sans-serif; background-color: #0B1120; color: #f8fafc; overflow-x: hidden; }
        .gradient-text { background: linear-gradient(to right, #60A5FA, #818CF8, #C084FC); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
        .hero-glow { position: absolute; width: 800px; height: 800px; background: radial-gradient(circle, rgba(59,130,246,0.15) 0%, rgba(11,17,32,0) 60%); top: -300px; left: 50%; transform: translateX(-50%); z-index: -1; }
        .glass-nav { background: rgba(11, 17, 32, 0.85); backdrop-filter: blur(16px); border-bottom: 1px solid rgba(255,255,255,0.05); }
        
        /* LANGUAGE SWITCHER LOGIC */
        body.lang-en-active .lang-sw { display: none !important; }
        body.lang-sw-active .lang-en { display: none !important; }

        .float-anim { animation: float 6s ease-in-out infinite; }
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-15px); }
            100% { transform: translateY(0px); }
        }
    </style>
</head>
<body class="antialiased selection:bg-blue-500 selection:text-white lang-sw-active">

    <div class="hero-glow"></div>

    <nav class="fixed w-full z-50 glass-nav transition-all duration-300">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <div class="flex items-center space-x-3 cursor-pointer" onclick="window.scrollTo(0,0)">
                    <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-xl flex items-center justify-center shadow-lg shadow-blue-500/30">
                        <i class="fas fa-layer-group text-white text-lg"></i>
                    </div>
                    <span class="font-extrabold text-2xl tracking-tight">CardSys <span class="text-blue-500">Pro</span></span>
                </div>
                
                <div class="hidden lg:flex items-baseline space-x-10">
                    <a href="#features" class="text-slate-300 hover:text-white font-semibold text-sm transition-colors">
                        <span class="lang-sw">Sifa za Mfumo</span><span class="lang-en">Features</span>
                    </a>
                    <a href="#packages" class="text-slate-300 hover:text-white font-semibold text-sm transition-colors">
                        <span class="lang-sw">Vifurushi</span><span class="lang-en">Packages</span>
                    </a>
                </div>

                <div class="flex items-center space-x-5">
                    <button onclick="toggleLanguage()" class="lang-toggle-btn bg-slate-800/50 hover:bg-slate-700 border border-slate-700 text-slate-300 hover:text-white px-3 py-1.5 rounded-lg text-xs font-black transition-all shadow-sm flex items-center">
                        <i class="fas fa-globe mr-2"></i> EN
                    </button>
                    <a href="/login" class="text-slate-300 hover:text-white font-bold text-sm transition-colors hidden sm:block">
                        <span class="lang-sw">Ingia Kwenye Akaunti</span><span class="lang-en">Login</span>
                    </a>
                    <a href="#contact" class="bg-white text-slate-900 hover:bg-blue-50 px-6 py-2.5 rounded-full font-extrabold text-sm transition-all transform hover:-translate-y-0.5 shadow-xl hover:shadow-blue-500/20 hidden md:block">
                        <span class="lang-sw">Wasiliana Nasi</span><span class="lang-en">Contact Sales</span>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <div class="relative pt-32 pb-20 sm:pt-40 sm:pb-24 overflow-hidden">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10 flex flex-col lg:flex-row items-center">
            
            <div class="w-full lg:w-1/2 text-center lg:text-left mb-16 lg:mb-0 lg:pr-12">
                <div class="inline-flex items-center space-x-2 bg-blue-500/10 border border-blue-500/20 rounded-full px-4 py-1.5 mb-6">
                    <span class="flex h-2 w-2 relative">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-blue-500"></span>
                    </span>
                    <span class="text-xs font-black text-blue-400 uppercase tracking-widest">
                        <span class="lang-sw">Kizazi Kipya cha Networking</span><span class="lang-en">The New Era of Networking</span>
                    </span>
                </div>
                
                <h1 class="text-5xl lg:text-7xl font-black tracking-tight mb-6 leading-[1.1]">
                    <span class="lang-sw">Kadi za Karatasi <br>Zimepitwa na <span class="gradient-text">Wakati.</span></span>
                    <span class="lang-en">Paper Cards are <br>Officially <span class="gradient-text">Dead.</span></span>
                </h1>
                
                <p class="text-lg text-slate-400 font-medium mb-10 leading-relaxed max-w-xl mx-auto lg:mx-0">
                    <span class="lang-sw">CardSys Pro inakupa uwezo wa kusambaza taarifa zako za kikazi, kukusanya wateja (leads), na kusimamia brand ya kampuni yako ukitumia kadi moja tu ya kidijitali.</span>
                    <span class="lang-en">Empower your team to share professional details, capture leads instantly, and manage your corporate brand identity with a single digital smart card.</span>
                </p>
                
                <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start space-y-4 sm:space-y-0 sm:space-x-4">
                    <a href="#packages" class="w-full sm:w-auto px-8 py-4 bg-blue-600 hover:bg-blue-500 text-white rounded-full font-bold text-lg transition-all shadow-xl shadow-blue-500/30">
                        <span class="lang-sw">Tazama Vifurushi <i class="fas fa-arrow-right ml-2"></i></span>
                        <span class="lang-en">View Packages <i class="fas fa-arrow-right ml-2"></i></span>
                    </a>
                </div>
            </div>

            <div class="w-full lg:w-1/2 relative h-[400px] lg:h-[500px] flex justify-center items-center float-anim">
                <div class="absolute w-64 h-80 bg-gradient-to-br from-indigo-900 to-slate-800 rounded-[2rem] border border-slate-700/50 shadow-2xl transform rotate-12 translate-x-12 opacity-80 backdrop-blur-sm"></div>
                <div class="absolute w-72 h-[22rem] bg-gradient-to-br from-blue-600 to-indigo-800 rounded-[2rem] border border-blue-400/30 shadow-2xl transform -rotate-6 -translate-x-8 flex flex-col p-6 overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-white/10 rounded-full blur-2xl -mr-10 -mt-10"></div>
                    <div class="w-16 h-16 bg-white rounded-2xl p-1 mb-4 shadow-lg z-10">
                        <img src="https://ui-avatars.com/api/?name=B-Tech&background=0f172a&color=fff" class="w-full h-full rounded-xl">
                    </div>
                    <h3 class="text-white font-black text-2xl z-10">B-Tech Group</h3>
                    <p class="text-blue-200 text-xs font-bold uppercase tracking-widest z-10">Technology Solutions</p>
                    
                    <div class="mt-auto space-y-3 z-10">
                        <div class="h-10 bg-white/20 backdrop-blur-md rounded-xl w-full flex items-center justify-center text-white text-xs font-bold border border-white/20">
                            <i class="fas fa-address-book mr-2"></i> SAVE TO CONTACTS
                        </div>
                        <div class="grid grid-cols-3 gap-2">
                            <div class="h-10 bg-white/10 rounded-xl flex items-center justify-center"><i class="fab fa-whatsapp text-white"></i></div>
                            <div class="h-10 bg-white/10 rounded-xl flex items-center justify-center"><i class="fas fa-envelope text-white"></i></div>
                            <div class="h-10 bg-white/10 rounded-xl flex items-center justify-center"><i class="fab fa-linkedin-in text-white"></i></div>
                        </div>
                    </div>
                </div>
                <div class="absolute top-10 right-10 w-16 h-16 bg-white rounded-full flex items-center justify-center shadow-2xl border border-slate-100 animate-bounce" style="animation-duration: 3s;">
                    <i class="fas fa-wifi text-blue-600 text-2xl transform rotate-90"></i>
                </div>
            </div>
        </div>
    </div>

    <div id="features" class="py-24 bg-[#0f172a] border-t border-slate-800">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-3xl md:text-5xl font-black mb-6">
                    <span class="lang-sw">Sifa Kuu za <span class="text-blue-500">Mfumo Wetu</span></span>
                    <span class="lang-en">Core <span class="text-blue-500">Platform</span> Features</span>
                </h2>
                <p class="text-slate-400 text-lg">
                    <span class="lang-sw">Kila kitu unachohitaji kujenga mtandao wako wa kibiashara na kuongeza mauzo kipo hapa.</span>
                    <span class="lang-en">Everything you need to build your business network and boost sales is right here.</span>
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-[#0B1120] p-8 rounded-[2rem] border border-slate-800 hover:border-blue-500 transition-all group">
                    <div class="w-14 h-14 bg-blue-500/10 text-blue-500 rounded-2xl flex items-center justify-center text-2xl mb-6 group-hover:scale-110 transition-transform"><i class="fas fa-address-book"></i></div>
                    <h3 class="text-xl font-bold mb-3"><span class="lang-sw">Save To Contacts (vCard)</span><span class="lang-en">Save To Contacts (vCard)</span></h3>
                    <p class="text-slate-400 text-sm leading-relaxed"><span class="lang-sw">Mteja akiscan kadi yako, anaweza kuhifadhi namba yako na taarifa zako zote moja kwa moja kwenye simu yake kwa kubonyeza kitufe kimoja.</span><span class="lang-en">With one tap, clients can download your full contact details straight into their phone's address book.</span></p>
                </div>
                <div class="bg-[#0B1120] p-8 rounded-[2rem] border border-slate-800 hover:border-blue-500 transition-all group">
                    <div class="w-14 h-14 bg-blue-500/10 text-blue-500 rounded-2xl flex items-center justify-center text-2xl mb-6 group-hover:scale-110 transition-transform"><i class="fas fa-qrcode"></i></div>
                    <h3 class="text-xl font-bold mb-3"><span class="lang-sw">Smart QR Code</span><span class="lang-en">Smart QR Code</span></h3>
                    <p class="text-slate-400 text-sm leading-relaxed"><span class="lang-sw">Kila kadi inakuja na QR code yake maalum yenye rangi ya brand yako, tayari kuskaniwa kwenye simu yoyote bila App.</span><span class="lang-en">Every card gets a custom branded QR code, scannable by any smartphone without needing to download an app.</span></p>
                </div>
                <div class="bg-[#0B1120] p-8 rounded-[2rem] border border-slate-800 hover:border-blue-500 transition-all group">
                    <div class="w-14 h-14 bg-blue-500/10 text-blue-500 rounded-2xl flex items-center justify-center text-2xl mb-6 group-hover:scale-110 transition-transform"><i class="fas fa-paint-brush"></i></div>
                    <h3 class="text-xl font-bold mb-3"><span class="lang-sw">Muonekano wa Kisasa</span><span class="lang-en">Modern Templates</span></h3>
                    <p class="text-slate-400 text-sm leading-relaxed"><span class="lang-sw">Chagua kati ya muundo wa Kadi ya Biashara (Landscape) au Kitambulisho cha Kazi (ID Badge Portrait) kulingana na hitaji lako.</span><span class="lang-en">Choose between a classic Landscape Business Card or a Corporate ID Badge (Portrait) layout.</span></p>
                </div>
                <div class="bg-[#0B1120] p-8 rounded-[2rem] border border-slate-800 hover:border-blue-500 transition-all group">
                    <div class="w-14 h-14 bg-blue-500/10 text-blue-500 rounded-2xl flex items-center justify-center text-2xl mb-6 group-hover:scale-110 transition-transform"><i class="fas fa-building"></i></div>
                    <h3 class="text-xl font-bold mb-3"><span class="lang-sw">Multi-Tenant Dashboard</span><span class="lang-en">Multi-Tenant Dashboard</span></h3>
                    <p class="text-slate-400 text-sm leading-relaxed"><span class="lang-sw">Makampuni yanapewa panel maalum ya kutengeneza, kubadilisha taarifa, na kusimamia kadi za wafanyakazi wao wote sehemu moja.</span><span class="lang-en">Companies get a centralized admin panel to create, update, and manage all employee cards in one place.</span></p>
                </div>
                <div class="bg-[#0B1120] p-8 rounded-[2rem] border border-slate-800 hover:border-blue-500 transition-all group">
                    <div class="w-14 h-14 bg-blue-500/10 text-blue-500 rounded-2xl flex items-center justify-center text-2xl mb-6 group-hover:scale-110 transition-transform"><i class="fas fa-link"></i></div>
                    <h3 class="text-xl font-bold mb-3"><span class="lang-sw">Link Moja, Mitandao Yote</span><span class="lang-en">One Link, All Socials</span></h3>
                    <p class="text-slate-400 text-sm leading-relaxed"><span class="lang-sw">Unganisha WhatsApp, Instagram, LinkedIn, na Email kwenye link moja rahisi unayoweza kuweka kwenye Bio yako ya mitandao.</span><span class="lang-en">Connect WhatsApp, Instagram, LinkedIn, and Email in one clean link, perfect for your social media Bio.</span></p>
                </div>
                <div class="bg-[#0B1120] p-8 rounded-[2rem] border border-slate-800 hover:border-blue-500 transition-all group">
                    <div class="w-14 h-14 bg-blue-500/10 text-blue-500 rounded-2xl flex items-center justify-center text-2xl mb-6 group-hover:scale-110 transition-transform"><i class="fas fa-shield-alt"></i></div>
                    <h3 class="text-xl font-bold mb-3"><span class="lang-sw">Usalama wa Data</span><span class="lang-en">Data Security</span></h3>
                    <p class="text-slate-400 text-sm leading-relaxed"><span class="lang-sw">Taarifa zako zinahifadhiwa kwenye server salama sana. Wewe ndiye mwenye mamlaka ya kubadilisha au kufuta kadi yako muda wowote.</span><span class="lang-en">Your details are hosted on secure servers. You retain full control to edit or delete your card at any time.</span></p>
                </div>
            </div>
        </div>
    </div>

    <div id="packages" class="py-24 bg-[#0B1120] border-t border-slate-800 relative">
        <div class="absolute inset-0 bg-blue-900/5 blur-3xl rounded-full w-full h-full pointer-events-none"></div>
        <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-3xl md:text-5xl font-black mb-6">
                    <span class="lang-sw">Vifurushi Vyema Kwa <span class="text-blue-500">Kila Mmoja</span></span>
                    <span class="lang-en">Tailored Packages for <span class="text-blue-500">Everyone</span></span>
                </h2>
                <p class="text-slate-400 text-lg">
                    <span class="lang-sw">Chagua mpango unaoendana na ukubwa wa mahitaji yako au ya kampuni yako.</span>
                    <span class="lang-en">Choose a plan that fits your personal or corporate needs perfectly.</span>
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-5xl mx-auto">
                
                <div class="bg-[#0f172a] rounded-[2.5rem] p-10 border border-slate-800 flex flex-col hover:border-blue-500/50 transition-all">
                    <h3 class="text-2xl font-black text-white mb-2">
                        <span class="lang-sw">Mtu Binafsi / Professional</span><span class="lang-en">Individual / Professional</span>
                    </h3>
                    <p class="text-slate-400 text-sm mb-8">
                        <span class="lang-sw">Maalum kwa wajasiriamali, freelancers, na wataalamu wa masoko.</span>
                        <span class="lang-en">Perfect for entrepreneurs, freelancers, and marketers.</span>
                    </p>
                    
                    <ul class="space-y-4 mb-10 flex-1">
                        <li class="flex items-start text-slate-300"><i class="fas fa-check-circle text-blue-500 mt-1 mr-3"></i> <span class="lang-sw">Kadi 1 ya Kidijitali</span><span class="lang-en">1 Digital Smart Card</span></li>
                        <li class="flex items-start text-slate-300"><i class="fas fa-check-circle text-blue-500 mt-1 mr-3"></i> <span class="lang-sw">Custom Link (mf. cardsys.info/jina)</span><span class="lang-en">Custom Link (e.g., cardsys.info/name)</span></li>
                        <li class="flex items-start text-slate-300"><i class="fas fa-check-circle text-blue-500 mt-1 mr-3"></i> <span class="lang-sw">QR Code ya Kuscan</span><span class="lang-en">Scannable QR Code</span></li>
                        <li class="flex items-start text-slate-300"><i class="fas fa-check-circle text-blue-500 mt-1 mr-3"></i> <span class="lang-sw">Viunganishi vya Mitandao ya Kijamii</span><span class="lang-en">Social Media Integrations</span></li>
                        <li class="flex items-start text-slate-300"><i class="fas fa-check-circle text-blue-500 mt-1 mr-3"></i> <span class="lang-sw">Kitufe cha 'Save to Contacts'</span><span class="lang-en">'Save to Contacts' Feature</span></li>
                    </ul>
                    
                    <a href="https://wa.me/255745517500" class="w-full block text-center bg-slate-800 hover:bg-slate-700 text-white font-bold py-4 rounded-xl transition-all border border-slate-700">
                        <span class="lang-sw">Pata Nukuu (Get Quote)</span><span class="lang-en">Request Quote</span>
                    </a>
                </div>

                <div class="bg-gradient-to-b from-blue-900/40 to-[#0f172a] rounded-[2.5rem] p-10 border border-blue-500/50 flex flex-col relative transform md:-translate-y-4 shadow-2xl shadow-blue-900/20">
                    <div class="absolute top-0 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-blue-500 text-white px-4 py-1 rounded-full text-[10px] font-black uppercase tracking-widest">
                        <span class="lang-sw">Inapendekezwa</span><span class="lang-en">Recommended</span>
                    </div>
                    <h3 class="text-2xl font-black text-white mb-2">
                        <span class="lang-sw">Kampuni / Taasisi</span><span class="lang-en">Corporate / Enterprise</span>
                    </h3>
                    <p class="text-blue-200 text-sm mb-8">
                        <span class="lang-sw">Mfumo kamili wa usimamizi wa kadi kwa wafanyakazi wote.</span>
                        <span class="lang-en">Complete card management system for all your employees.</span>
                    </p>
                    
                    <ul class="space-y-4 mb-10 flex-1">
                        <li class="flex items-start text-slate-200"><i class="fas fa-check-circle text-blue-400 mt-1 mr-3"></i> <span class="lang-sw">Kadi Nyingi za Wafanyakazi</span><span class="lang-en">Multiple Employee Cards</span></li>
                        <li class="flex items-start text-slate-200"><i class="fas fa-check-circle text-blue-400 mt-1 mr-3"></i> <span class="lang-sw">Admin Dashboard Kujisimamia</span><span class="lang-en">Self-Management Admin Dashboard</span></li>
                        <li class="flex items-start text-slate-200"><i class="fas fa-check-circle text-blue-400 mt-1 mr-3"></i> <span class="lang-sw">Muonekano wa 'ID Badge' & 'Biz Card'</span><span class="lang-en">ID Badge & Business Card Templates</span></li>
                        <li class="flex items-start text-slate-200"><i class="fas fa-check-circle text-blue-400 mt-1 mr-3"></i> <span class="lang-sw">Brand Colors na Logo ya Kampuni</span><span class="lang-en">Company Logo and Brand Colors</span></li>
                        <li class="flex items-start text-slate-200"><i class="fas fa-check-circle text-blue-400 mt-1 mr-3"></i> <span class="lang-sw">Support na Updates za Moja kwa Moja</span><span class="lang-en">Priority Support & Regular Updates</span></li>
                    </ul>
                    
                    <a href="mailto:sales@cardsys.info" class="w-full block text-center bg-blue-600 hover:bg-blue-500 text-white font-bold py-4 rounded-xl transition-all shadow-lg shadow-blue-500/30">
                        <span class="lang-sw">Wasiliana na Mauzo</span><span class="lang-en">Contact Sales Team</span>
                    </a>
                </div>

            </div>
        </div>
    </div>

    <footer id="contact" class="bg-[#05080f] pt-20 pb-10 border-t border-slate-800 relative overflow-hidden">
        <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-blue-900/10 blur-3xl rounded-full"></div>
        
        <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-16">
                
                <div class="lg:col-span-1">
                    <div class="flex items-center space-x-3 mb-6">
                        <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center shadow-lg">
                            <i class="fas fa-layer-group text-white text-sm"></i>
                        </div>
                        <span class="font-extrabold text-xl tracking-tight text-white">CardSys <span class="text-blue-500">Pro</span></span>
                    </div>
                    <p class="text-slate-400 text-sm leading-relaxed mb-6">
                        <span class="lang-sw">Badilisha namna unavyofanya networking. Mfumo wa kidijitali unaokuruhusu kutengeneza, kusimamia, na kusambaza kadi za kisasa za kibiashara kwa urahisi.</span>
                        <span class="lang-en">Revolutionize your networking. The ultimate digital platform allowing you to create, manage, and share modern smart business cards effortlessly.</span>
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 rounded-full bg-slate-800 flex items-center justify-center text-slate-400 hover:bg-blue-600 hover:text-white transition-all"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="w-10 h-10 rounded-full bg-slate-800 flex items-center justify-center text-slate-400 hover:bg-blue-600 hover:text-white transition-all"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="w-10 h-10 rounded-full bg-slate-800 flex items-center justify-center text-slate-400 hover:bg-blue-600 hover:text-white transition-all"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>

                <div>
                    <h4 class="text-white font-black text-sm uppercase tracking-widest mb-6">
                        <span class="lang-sw">Viungo Muhimu</span><span class="lang-en">Quick Links</span>
                    </h4>
                    <ul class="space-y-4 text-sm font-medium text-slate-400">
                        <li><a href="/login" class="hover:text-blue-400 transition-colors flex items-center"><i class="fas fa-angle-right mr-2 text-blue-600 text-xs"></i> <span class="lang-sw">Ingia Kwenye Mfumo</span><span class="lang-en">Admin Login</span></a></li>
                        <li><a href="#features" class="hover:text-blue-400 transition-colors flex items-center"><i class="fas fa-angle-right mr-2 text-blue-600 text-xs"></i> <span class="lang-sw">Sifa za Mfumo</span><span class="lang-en">Platform Features</span></a></li>
                        <li><a href="#" class="hover:text-blue-400 transition-colors flex items-center"><i class="fas fa-angle-right mr-2 text-blue-600 text-xs"></i> <span class="lang-sw">Sera ya Faragha</span><span class="lang-en">Privacy Policy</span></a></li>
                    </ul>
                </div>

                <div class="lg:col-span-2 bg-slate-800/30 p-8 rounded-[2rem] border border-slate-800 backdrop-blur-sm">
                    <h4 class="text-white font-black text-sm uppercase tracking-widest mb-6">
                        <span class="lang-sw">Wasiliana Nasi Mauzo & Usaidizi</span>
                        <span class="lang-en">Contact Sales & Support</span>
                    </h4>
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div class="space-y-5">
                            <a href="tel:+255745517500" class="flex items-start group">
                                <div class="w-10 h-10 rounded-xl bg-blue-500/10 text-blue-400 flex items-center justify-center mr-4 group-hover:bg-blue-500 group-hover:text-white transition-all">
                                    <i class="fas fa-phone-alt"></i>
                                </div>
                                <div>
                                    <p class="text-[10px] font-bold text-slate-500 uppercase tracking-widest"><span class="lang-sw">Piga Simu / WhatsApp</span><span class="lang-en">Call / WhatsApp</span></p>
                                    <p class="text-white font-bold text-lg mt-0.5">+255 745 517 500</p>
                                </div>
                            </a>
                            
                            <a href="mailto:sales@cardsys.info" class="flex items-start group">
                                <div class="w-10 h-10 rounded-xl bg-emerald-500/10 text-emerald-400 flex items-center justify-center mr-4 group-hover:bg-emerald-500 group-hover:text-white transition-all">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div>
                                    <p class="text-[10px] font-bold text-slate-500 uppercase tracking-widest"><span class="lang-sw">Barua Pepe (Mauzo)</span><span class="lang-en">Email (Sales)</span></p>
                                    <p class="text-slate-300 font-semibold text-sm mt-1">sales@cardsys.info</p>
                                    <p class="text-slate-400 text-xs">info@cardsys.info</p>
                                </div>
                            </a>
                        </div>
                        
                        <div class="space-y-5">
                            <div class="flex items-start">
                                <div class="w-10 h-10 rounded-xl bg-purple-500/10 text-purple-400 flex items-center justify-center mr-4">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div>
                                    <p class="text-[10px] font-bold text-slate-500 uppercase tracking-widest"><span class="lang-sw">Ofisi Zetu</span><span class="lang-en">Our Office</span></p>
                                    <p class="text-slate-300 font-semibold text-sm mt-1">Dar es Salaam,</p>
                                    <p class="text-slate-400 text-xs">Tanzania</p>
                                </div>
                            </div>
                            
                            <a href="https://wa.me/255745517500" class="mt-4 block w-full text-center bg-white hover:bg-slate-200 text-slate-900 font-bold py-3 rounded-xl transition-all text-sm">
                                <span class="lang-sw">Tuma Ujumbe Sasa</span><span class="lang-en">Message Us Now</span>
                            </a>
                        </div>
                    </div>
                </div>

            </div>

            <div class="border-t border-slate-800 pt-8 flex flex-col justify-center items-center text-center">
                <p class="text-slate-500 text-xs font-semibold mb-2">
                    &copy; <script>document.write(new Date().getFullYear())</script> CardSys Pro. 
                    <span class="lang-sw">Imeundwa na</span><span class="lang-en">Powered by</span> 
                    <span class="text-white font-bold">B-Tech Creations</span>.
                </p>
                <div class="text-xs font-semibold text-slate-500">
                    <span class="lang-sw">Haki zote zimehifadhiwa.</span><span class="lang-en">All rights reserved.</span>
                </div>
            </div>
        </div>
    </footer>

    <script>
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
                btn.innerHTML = lang === 'en' ? '<i class="fas fa-globe mr-2"></i> SW' : '<i class="fas fa-globe mr-2"></i> EN';
            });
        }

        document.addEventListener('DOMContentLoaded', () => {
            applyLang(localStorage.getItem('cardsys_lang') || 'sw');
        });
    </script>
</body>
</html>