@extends('layouts.app')
@section('title', 'AI Integration & Automation — One Stop IT Solution')
@section('description', 'Integrate AI into your existing software — chatbots, ML models, workflow automation, NLP, predictive analytics, and LLM-powered features.')
@section('content')

<section class="hero-light relative overflow-hidden pt-[70px]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-16 lg:py-24 grid lg:grid-cols-2 gap-12 lg:gap-20 items-center">
        <div class="text-center lg:text-left reveal">
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full border border-[#8B5CF6]/25 bg-[#8B5CF6]/6 text-[#7C3AED] text-xs font-semibold tracking-wide uppercase mb-6">
                <span class="w-1.5 h-1.5 rounded-full animate-pulse" style="background:#8B5CF6"></span>
                AI & Automation
            </div>
            <h1 class="text-4xl sm:text-5xl lg:text-[3.25rem] font-extrabold leading-[1.1] tracking-tight mb-5 text-text">
                Add Intelligence<br><span style="background:linear-gradient(135deg,#8B5CF6,#3B82F6);-webkit-background-clip:text;-webkit-text-fill-color:transparent">To Your Software</span>
            </h1>
            <p class="text-muted text-base sm:text-lg leading-relaxed max-w-lg mx-auto lg:mx-0 mb-8">
                We integrate cutting-edge AI into your existing systems — chatbots, document processing, predictive analytics, and workflow automation that saves time and drives growth.
            </p>
            <div class="flex flex-wrap items-center justify-center lg:justify-start gap-3">
                <a href="{{ route('custom-request') }}" class="btn-primary" style="background:linear-gradient(135deg,#8B5CF6,#3B82F6)">Start Your AI Project</a>
                <a href="{{ route('contact') }}" class="btn-ghost">Talk to an Expert <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg></a>
            </div>
        </div>
        <div class="hidden lg:flex items-center justify-center reveal delay-200" aria-hidden="true">
            <div class="w-full max-w-md rounded-2xl border border-black/8 bg-white shadow-xl p-5">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-9 h-9 rounded-xl flex items-center justify-center" style="background:linear-gradient(135deg,#8B5CF6,#3B82F6)">
                        <svg width="16" height="16" fill="none" stroke="white" stroke-width="2" viewBox="0 0 24 24"><path d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/></svg>
                    </div>
                    <div><p class="text-text font-bold text-sm">AI Assistant</p><p class="text-muted text-xs">Powered by GPT-4</p></div>
                    <span class="ml-auto flex items-center gap-1 text-xs text-green-600"><span class="w-1.5 h-1.5 rounded-full bg-green-400"></span>Active</span>
                </div>
                <div class="space-y-3 text-sm">
                    <div class="bg-surface rounded-xl p-3"><p class="text-muted text-xs mb-1">User</p><p class="text-text">What's our Q3 revenue forecast?</p></div>
                    <div class="bg-primary/6 border border-primary/15 rounded-xl p-3"><p class="text-primary text-xs mb-1">AI</p><p class="text-text text-sm">Based on current trends, Q3 revenue is projected at <strong>$142K</strong> — 23% above Q2. Top driver: enterprise contracts (+4 this month).</p></div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-24 bg-surface">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="text-center mb-14 reveal"><p class="text-xs font-semibold tracking-widest uppercase text-muted mb-3">What We Build</p><h2 class="text-3xl sm:text-4xl font-extrabold text-text mb-4">AI Solutions That Work in the Real World</h2></div>
        @php $feats=[
            ['AI Chatbots & Assistants','Custom chatbots using GPT-4/Claude APIs — trained on your data, integrated into your website, app, or CRM.','#8B5CF6','M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z'],
            ['Workflow Automation','Automate repetitive tasks using n8n, Zapier, or custom pipelines — connect your tools and eliminate manual work.','#3B82F6','M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15'],
            ['Document Processing','AI-powered OCR, data extraction, and classification from invoices, contracts, and forms — automated document pipelines.','#F59E0B','M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z'],
            ['Predictive Analytics','Machine learning models that forecast sales, churn, demand, and other business metrics from your historical data.','#059669','M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z'],
            ['NLP & Text Analysis','Sentiment analysis, entity extraction, content moderation, and semantic search powered by transformer models.','#EF1B3F','M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z'],
            ['AI-Powered Search','Semantic search with vector embeddings — smarter product search, knowledge bases, and recommendation engines.','#06B6D4','M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z'],
        ]; @endphp
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
            @foreach($feats as $i=>$f)
            <div class="bg-white border border-black/6 rounded-2xl p-6 hover:shadow-md hover:-translate-y-1 transition reveal delay-{{ ($i%3+1)*100 }}">
                <div class="w-11 h-11 rounded-xl flex items-center justify-center mb-4" style="background:{{ $f[2] }}0D;border:1px solid {{ $f[2] }}22">
                    <svg width="20" height="20" fill="none" stroke="{{ $f[2] }}" stroke-width="1.8" viewBox="0 0 24 24"><path d="{{ $f[3] }}"/></svg>
                </div>
                <h3 class="text-text font-bold mb-2 text-sm">{{ $f[0] }}</h3>
                <p class="text-muted text-sm leading-relaxed">{{ $f[1] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 text-center reveal">
        <p class="text-xs font-semibold tracking-widest uppercase text-muted mb-3">AI Stack</p>
        <div class="flex flex-wrap justify-center gap-3 mt-6">
            @foreach(['OpenAI GPT-4','Claude API','LangChain','Python','TensorFlow','PyTorch','n8n','Zapier','Pinecone','Weaviate','HuggingFace','FastAPI'] as $t)
            <span class="tech-pill px-4 py-2 text-sm font-medium">{{ $t }}</span>
            @endforeach
        </div>
    </div>
</section>

<section class="py-20 bg-surface">
    <div class="max-w-3xl mx-auto px-4 sm:px-6">
        <div class="text-center mb-12 reveal"><p class="text-xs font-semibold tracking-widest uppercase text-muted mb-3">FAQ</p><h2 class="text-3xl font-extrabold text-text">Common Questions</h2></div>
        <div x-data="{}">
            @foreach([['Do I need a large dataset to use AI?','Not necessarily. Many AI integrations use pre-trained models (like GPT-4) that require minimal fine-tuning data. We assess your use case and recommend the best approach.'],['Can you integrate AI into our existing software?','Yes — we build API integrations that add AI capabilities to your current system without requiring a full rebuild.'],['How do you handle data privacy?','We can deploy models on-premise or in your private cloud to keep sensitive data within your infrastructure. All API calls can be routed through your own account.'],['What\'s a realistic timeline for an AI project?','A chatbot integration typically takes 1–3 weeks. A custom ML model with training and deployment takes 4–12 weeks depending on data availability and complexity.']] as $i=>$faq)
            <div class="faq-item reveal delay-{{ ($i+1)*100 }}" x-data="{ open: false }">
                <button @click="open=!open" class="w-full flex items-center justify-between py-5 text-left gap-4" :aria-expanded="open">
                    <span class="text-text font-semibold text-sm">{{ $faq[0] }}</span>
                    <span class="shrink-0 w-7 h-7 rounded-full border border-black/10 flex items-center justify-center transition-transform duration-300" :class="open?'rotate-45 border-primary/40 bg-primary/8':''"><svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg></span>
                </button>
                <div x-show="open" x-collapse><p class="pb-5 text-muted text-sm leading-relaxed">{{ $faq[1] }}</p></div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="py-20 bg-text">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 text-center reveal">
        <h2 class="text-3xl sm:text-4xl font-extrabold text-white mb-4">Ready to Automate with AI?</h2>
        <p class="text-white/55 max-w-lg mx-auto mb-8">Tell us your biggest time sink or data challenge — we'll show you how AI can solve it.</p>
        <div class="flex flex-wrap items-center justify-center gap-3">
            <a href="{{ route('custom-request') }}" class="btn-primary">Discuss Your Project</a>
            <a href="{{ route('contact') }}" class="btn-ghost-dark">Contact Us</a>
        </div>
    </div>
</section>
@endsection
@push('scripts') @vite('resources/js/pages/services.js') @endpush
