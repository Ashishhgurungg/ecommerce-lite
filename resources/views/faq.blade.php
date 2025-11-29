@include('headerfooter.boiler')
<body class="flex flex-col min-h-screen bg-[#0e121c] text-[#d6dfed]">
    @include('headerfooter.header')

    <main class="flex-grow p-6 items-center flex flex-col">
        <h1 class="text-3xl font-bold underline">FAQ</h1>
        <p class="mt-4 text-center">Find answers to common questions about our AI services.</p>

        <!-- FAQ Section -->
        <div class="mt-8 w-full max-w-3xl space-y-4">

            <!-- FAQ Item -->
            <div class="bg-[#1e2230] p-4 rounded-lg shadow-md">
                <button onclick="toggleFAQ(1)" class="w-full flex justify-between items-center text-left">
                    <span class="font-semibold text-lg">What AI services do you provide?</span>
                    <span id="icon-1">+</span>
                </button>
                <div id="faq-1" class="hidden mt-3 text-gray-300">
                    We provide AI chatbot development, AI automation tools, customer support AI agents, 
                    machine learning solutions, and AI integrations for websites and applications.
                </div>
            </div>

            <!-- FAQ Item -->
            <div class="bg-[#1e2230] p-4 rounded-lg shadow-md">
                <button onclick="toggleFAQ(2)" class="w-full flex justify-between items-center text-left">
                    <span class="font-semibold text-lg">How long does it take to develop an AI chatbot?</span>
                    <span id="icon-2">+</span>
                </button>
                <div id="faq-2" class="hidden mt-3 text-gray-300">
                    A standard AI chatbot typically takes 3–7 days depending on the complexity and integrations required.
                </div>
            </div>

            <!-- FAQ Item -->
            <div class="bg-[#1e2230] p-4 rounded-lg shadow-md">
                <button onclick="toggleFAQ(3)" class="w-full flex justify-between items-center text-left">
                    <span class="font-semibold text-lg">Can your AI chatbot integrate with my website?</span>
                    <span id="icon-3">+</span>
                </button>
                <div id="faq-3" class="hidden mt-3 text-gray-300">
                    Yes! Our AI chatbots integrate smoothly with any website including Laravel, WordPress, React, 
                    and any custom backend using REST APIs.
                </div>
            </div>

            <!-- FAQ Item -->
            <div class="bg-[#1e2230] p-4 rounded-lg shadow-md">
                <button onclick="toggleFAQ(4)" class="w-full flex justify-between items-center text-left">
                    <span class="font-semibold text-lg">Do you offer support after delivery?</span>
                    <span id="icon-4">+</span>
                </button>
                <div id="faq-4" class="hidden mt-3 text-gray-300">
                    Yes, we offer maintenance, performance optimization, and periodic AI model updates 
                    to keep your chatbot running perfectly.
                </div>
            </div>

            <!-- FAQ Item -->
            <div class="bg-[#1e2230] p-4 rounded-lg shadow-md">
                <button onclick="toggleFAQ(5)" class="w-full flex justify-between items-center text-left">
                    <span class="font-semibold text-lg">Is your AI secure and private?</span>
                    <span id="icon-5">+</span>
                </button>
                <div id="faq-5" class="hidden mt-3 text-gray-300">
                    Absolutely. Your data is encrypted, secured, and not used for training any external models. 
                    Privacy is our top priority.
                </div>
            </div>

        </div>
    </main>

    @include('headerfooter.footer')

    <script>
        function toggleFAQ(id) {
            const content = document.getElementById(`faq-${id}`);
            const icon = document.getElementById(`icon-${id}`);

            if (content.classList.contains("hidden")) {
                content.classList.remove("hidden");
                icon.innerText = "-";
            } else {
                content.classList.add("hidden");
                icon.innerText = "+";
            }
        }
    </script>

</body>
</html>
