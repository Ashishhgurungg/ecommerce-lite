@include('headerfooter.boiler')
<body class="flex flex-col min-h-screen bg-[#0e121c] text-[#d6dfed]">
    @include('headerfooter.header')

    <main class="flex-grow p-6 items-center flex flex-col">
        <h1 class="text-3xl font-bold underline">About Us</h1>
        <p class="mt-4 text-center max-w-3xl">
            We are a modern AI solutions provider dedicated to bringing intelligent automation, 
            conversational AI, and smart digital experiences to businesses of all sizes.
        </p>

        <!-- About Us Content Section -->
        <div class="mt-10 w-full max-w-4xl space-y-10">

            <!-- Who We Are -->
            <section class="bg-[#1e2230] p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-semibold mb-3">Who We Are</h2>
                <p class="text-gray-300 leading-relaxed">
                    We are a passionate team of AI developers, automation engineers, and creative thinkers
                    focused on building next-generation AI tools. Our mission is to make advanced AI 
                    accessible, affordable, and powerful for everyday business needs.  
                </p>
            </section>

            <!-- Our Mission -->
            <section class="bg-[#1e2230] p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-semibold mb-3">Our Mission</h2>
                <p class="text-gray-300 leading-relaxed">
                    Our mission is to empower businesses with intelligent systems that automate repetitive 
                    tasks, improve customer engagement, and increase efficiency.  
                    We aim to bring real, practical AI solutions that work in the real world — not just in theory.
                </p>
            </section>

            <!-- What We Do -->
            <section class="bg-[#1e2230] p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-semibold mb-3">What We Do</h2>
                <ul class="list-disc pl-6 text-gray-300 space-y-2">
                    <li>AI-powered chatbots for websites and apps</li>
                    <li>Automated customer support agents</li>
                    <li>AI workflow and business automation tools</li>
                    <li>ChatGPT-style assistants for companies</li>
                    <li>Machine learning models for insights & predictions</li>
                    <li>Custom AI integration for existing software</li>
                </ul>
            </section>

            <!-- Why Choose Us -->
            <section class="bg-[#1e2230] p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-semibold mb-3">Why Choose Us?</h2>
                <ul class="list-disc pl-6 text-gray-300 space-y-2">
                    <li>Professional, high-quality AI development</li>
                    <li>Fast delivery and dedicated support</li>
                    <li>Affordable AI solutions for all businesses</li>
                    <li>Customizable tools tailored to your needs</li>
                    <li>Secure, private, and reliable technology</li>
                </ul>
            </section>

            <!-- Closing -->
            <section class="bg-[#1e2230] p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-semibold mb-3">Our Vision</h2>
                <p class="text-gray-300 leading-relaxed">
                    We believe AI should help people — not replace them.  
                    Our vision is to create a future where businesses and AI work together seamlessly,
                    improving customer experience and boosting productivity without losing the human touch.
                </p>
            </section>

        </div>
    </main>

    @include('headerfooter.footer')
</body>
</html>
