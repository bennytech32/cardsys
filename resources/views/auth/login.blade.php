<!DOCTYPE html>
<html lang="sw">
<head>
    <meta charset="UTF-8">
    <title>Login | CardSys Lite</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-900 flex items-center justify-center min-h-screen p-6">
    <div class="bg-white w-full max-w-md rounded-3xl shadow-2xl overflow-hidden">
        <div class="p-10">
            <h1 class="text-3xl font-black text-slate-800 mb-2">Karibu Tena</h1>
            <p class="text-slate-400 font-medium mb-8">Ingia kusimamia kadi zako.</p>

            <form action="/login" method="POST" class="space-y-6">
                @csrf <div>
                    <label class="block text-xs font-black uppercase text-slate-400 mb-2 tracking-widest">Barua Pepe</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="w-full bg-slate-50 border border-slate-200 rounded-2xl p-4 focus:ring-2 focus:ring-blue-500 outline-none transition" required>
                    @error('email') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                </div>
                
                <div>
                    <label class="block text-xs font-black uppercase text-slate-400 mb-2 tracking-widest">Nenosiri</label>
                    <input type="password" name="password" class="w-full bg-slate-50 border border-slate-200 rounded-2xl p-4 focus:ring-2 focus:ring-blue-500 outline-none transition" required>
                </div>
                
                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-black py-4 rounded-2xl shadow-lg transition-all uppercase tracking-widest text-sm">
                    Ingia Sasa
                </button>
            </form>
        </div>
        <div class="bg-slate-50 p-4 text-center">
            <p class="text-[10px] text-slate-400 font-black uppercase tracking-widest">B-Tech Group &copy; 2026</p>
        </div>
    </div>
</body>
</html>