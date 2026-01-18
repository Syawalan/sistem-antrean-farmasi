<div class="bg-gray-900 min-h-screen p-8 text-white" wire:poll.3s>
    <div class="text-center mb-10">
        <h1 class="text-4xl font-bold uppercase tracking-widest text-blue-400">Monitoring Antrean Farmasi</h1>
        <p class="text-xl text-gray-400">{{ now()->format('d F Y | H:i') }}</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        @foreach($activeQueues as $counter)
            @php $current = $counter->queues->first(); @endphp
            <div class="bg-gray-800 border-2 {{ $current && $current->status == 'calling' ? 'border-red-500 animate-pulse' : 'border-blue-900' }} rounded-3xl p-6 shadow-2xl">
                <div class="text-center">
                    <h2 class="text-2xl font-bold text-gray-300 mb-4">{{ $counter->name }}</h2>
                    <div class="bg-black rounded-2xl py-10 mb-4">
                        <span class="text-8xl font-black {{ $current ? 'text-green-400' : 'text-gray-700' }}">
                            {{ $current ? $current->queue_number : '---' }}
                        </span>
                    </div>
                    <p class="text-lg font-medium text-gray-500 uppercase">
                        {{ $current ? $current->status : 'Kosong' }}
                    </p>
                </div>
            </div>
        @endforeach
    </div>

    {{-- Script Suara --}}
    <script>
        // Variabel untuk mencegah suara berulang-ulang
        let lastCalledNumber = '';

        document.addEventListener('livewire:init', () => {
            Livewire.on('play-voice', (event) => {
                const data = event[0]; // Mengambil data dari dispatch
                
                // Cek jika nomor ini sudah pernah dipanggil sebelumnya (mencegah loop suara karena polling)
                if (lastCalledNumber !== data.number) {
                    const text = `Nomor antrean ${data.number.split('').join(' ')}. silakan menuju. ${data.counter}`;
                    const utterance = new SpeechSynthesisUtterance(text);
                    utterance.lang = 'id-ID';
                    utterance.rate = 0.8; // Sedikit lebih lambat agar jelas
                    window.speechSynthesis.speak(utterance);
                    
                    lastCalledNumber = data.number;
                }
            });
        });
    </script>
</div>