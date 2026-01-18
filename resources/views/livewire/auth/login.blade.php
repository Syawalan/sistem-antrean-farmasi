<div class="flex items-center justify-center">
    <div
        class="bg-white w-full max-w-[480px] rounded-[32px] border border-gray-100 shadow-[0_20px_50px_rgba(0,0,0,0.05)] p-8">

        <div class="flex flex-col items-center mb-4">
            <div class="flex items-center gap-2 mb-3">
                <span class="text-2xl font-extrabold text-[#30B5F9] tracking-tight">Klinik Pratama Annisa Medika 1</span>
            </div>
            <h1 class="text-2xl font-bold text-gray-800">Login</h1>
        </div>

        <form wire:submit.prevent="Login" class="space-y-3">
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2 ml-1">Email</label>
                <input type="email" wire:model="email" placeholder="user@gmail.com"
                    class="w-full px-5 py-4 bg-white border border-gray-200 rounded-2xl outline-none focus:ring-4 focus:ring-blue-50 focus:border-[#30B5F9] transition-all text-gray-600 placeholder:text-gray-300">
                @error('email')
                    <span class="text-red-500 text-xs mt-1 ml-1">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2 ml-1">Password</label>
                <input type="password" wire:model="password" placeholder="••••••••"
                    class="w-full px-5 py-4 bg-white border border-gray-200 rounded-2xl outline-none focus:ring-4 focus:ring-blue-50 focus:border-[#30B5F9] transition-all text-gray-600 placeholder:text-gray-300 tracking-widest">
                @error('password')
                    <span class="text-red-500 text-xs mt-1 ml-1">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit"
                class="w-full bg-[#30B5F9] hover:bg-[#28A0DD] hover:cursor-pointer text-white font-bold py-5 rounded-2xl transition-all duration-300 shadow-lg shadow-blue-100 mt-4 active:scale-[0.98]">
                Login
            </button>
        </form>

        <p class="text-center text-gray-400 text-sm pt-4">
            © 2026 Klinik Pratama Annisa Medika 1. All rights reserved.
        </p>
    </div>
</div>
