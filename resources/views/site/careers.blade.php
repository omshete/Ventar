@extends('layouts.app')

@section('title', 'Careers - Join Our Team')

@section('content')
<!-- Hero Section -->
<section id="hero" class="py-26 text-white text-center bg-gradient-to-br from-red-500 to-orange-500">
    <div class="max-w-6xl mx-auto px-6">
        <h1 class="text-5xl md:text-7xl font-black mb-6 scroll-animate">Careers</h1>
        <p class="text-2xl md:text-3xl font-light max-w-3xl mx-auto leading-relaxed mb-12 scroll-animate">
            Join our passionate team and build the future together.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center items-center scroll-animate">
            <a href="#open-positions" class="bg-white text-orange-500 font-bold px-8 py-4 rounded-2xl shadow-2xl hover:shadow-3xl transform hover:-translate-y-2 transition-all duration-300 text-lg">
                <span class="material-icons mr-2">work</span>
                View Open Positions
            </a>
        </div>
    </div>
</section>

<!-- Why Join Us -->
<section class="py-24 bg-gradient-to-br from-orange-50 to-pink-50">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-20 scroll-animate">
            <h2 class="text-4xl md:text-5xl font-black text-slate-900 mb-6">Why Join Us?</h2>
            <p class="text-xl text-slate-600 max-w-3xl mx-auto leading-relaxed">Work with cutting-edge technologies and grow your career.</p>
        </div>
        <div class="grid md:grid-cols-3 gap-8">
            <div class="bg-white p-8 rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-300 hover:-translate-y-3 scroll-animate">
                <div class="w-16 h-16 bg-orange-500 rounded-2xl flex items-center justify-center mx-auto mb-6 text-white text-2xl">
                    <span class="material-icons">rocket_launch</span>
                </div>
                <h3 class="text-2xl font-black text-slate-900 mb-4 text-center">Innovative Projects</h3>
                <p class="text-slate-600 text-lg leading-relaxed text-center">Work on exciting projects that challenge you.</p>
            </div>
            <div class="bg-white p-8 rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-300 hover:-translate-y-3 scroll-animate delay-200">
                <div class="w-16 h-16 bg-orange-500 rounded-2xl flex items-center justify-center mx-auto mb-6 text-white text-2xl">
                    <span class="material-icons">groups</span>
                </div>
                <h3 class="text-2xl font-black text-slate-900 mb-4 text-center">Great Team</h3>
                <p class="text-slate-600 text-lg leading-relaxed text-center">Collaborate with talented developers.</p>
            </div>
            <div class="bg-white p-8 rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-300 hover:-translate-y-3 scroll-animate delay-400">
                <div class="w-16 h-16 bg-orange-500 rounded-2xl flex items-center justify-center mx-auto mb-6 text-white text-2xl">
                    <span class="material-icons">trending_up</span>
                </div>
                <h3 class="text-2xl font-black text-slate-900 mb-4 text-center">Career Growth</h3>
                <p class="text-slate-600 text-lg leading-relaxed text-center">Clear career progression paths.</p>
            </div>
        </div>
    </div>
</section>

<!-- Open Positions -->
<section id="open-positions" class="py-24 bg-white">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-20 scroll-animate">
            <h2 class="text-4xl md:text-5xl font-black text-slate-900 mb-6">Open Positions</h2>
            <p class="text-xl text-slate-600 max-w-2xl mx-auto">
                @if($careers->where('is_active', true)->count() > 0)
                    We're hiring {{ $careers->where('is_active', true)->count() }} talented individuals right now!
                @else
                    No open positions right now. Check back soon!
                @endif
            </p>
        </div>

        @if($careers->where('is_active', true)->count() > 0)
            <div class="grid md:grid-cols-2 lg:grid-cols-2 gap-8">
                @foreach($careers->where('is_active', true)->sortBy('sort_order') as $career)
                    <div class="group bg-gradient-to-br from-orange-50 to-indigo-50 p-8 rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border border-orange-100 scroll-animate" 
                         x-data="{ 
                            showForm: false,
                            jobTitle: '{{ addslashes($career->title) }}',
                            jobLocation: '{{ addslashes($career->location) }}',
                            jobType: '{{ addslashes($career->type) }}',
                            formData: {
                                name: '',
                                email: '',
                                phone: '',
                                portfolio: '',
                                coverLetter: ''
                            }
                         }">
                        
                        <!-- Job Header -->
                        <div class="flex items-start mb-6">
                            <div class="w-12 h-12 bg-orange-500 rounded-xl flex items-center justify-center text-white font-bold text-lg flex-shrink-0 mt-1">
                                <span class="material-icons text-sm">{{ $career->icon ?? 'work' }}</span>
                            </div>
                            <div class="ml-4 flex-1 min-w-0">
                                <h3 class="text-2xl font-black text-slate-900 mb-2 truncate">{{ $career->title }}</h3>
                                <span class="bg-orange-100 text-orange-800 px-3 py-1 rounded-full text-sm font-semibold">{{ $career->location }}</span>
                                <p class="text-xs text-slate-500 mt-1 font-medium">{{ $career->type }}</p>
                            </div>
                        </div>

                        <!-- Job Description -->
                        <div class="text-slate-700 text-lg mb-8 leading-relaxed" style="max-height: 120px; overflow-hidden;">
                            {!! nl2br(e($career->description)) !!}
                        </div>

                        <!-- Apply Button -->
                        <button @click="showForm = !showForm" 
                                class="w-full bg-orange-500 text-white font-bold py-3 px-6 rounded-xl text-center hover:bg-orange-600 shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300 group-hover:bg-orange-600">
                            <span class="material-icons mr-2 text-sm">send</span>
                            <span x-text="showForm ? 'Hide Form' : 'Apply Now'"></span>
                        </button>

                        <!-- ✅ FIXED FORM - ALL DATA IN ONE x-data -->
                        <div x-show="showForm" x-transition @click.away="showForm = false" 
                             class="mt-6 pt-6 border-t border-orange-200 space-y-4">
                            <form @submit.prevent="sendApplication()" 
                                  class="space-y-4 bg-white/80 p-6 rounded-2xl border border-orange-100">
                                
                                <div>
                                    <label class="block text-sm font-semibold text-slate-700 mb-2">Full Name *</label>
                                    <input type="text" x-model="formData.name" required 
                                           class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-orange-500 focus:border-orange-500" 
                                           placeholder="Enter your full name">
                                </div>

                                <div class="grid md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-semibold text-slate-700 mb-2">Email *</label>
                                        <input type="email" x-model="formData.email" required 
                                               class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-orange-500 focus:border-orange-500" 
                                               placeholder="your@email.com">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-semibold text-slate-700 mb-2">Phone</label>
                                        <input type="tel" x-model="formData.phone" 
                                               class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-orange-500 focus:border-orange-500" 
                                               placeholder="+91-XXXXXXXXXX">
                                    </div>
                                </div>

                                <div>
                                    <label class="block text-sm font-semibold text-slate-700 mb-2">Portfolio/LinkedIn</label>
                                    <input type="url" x-model="formData.portfolio" 
                                           class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-orange-500 focus:border-orange-500" 
                                           placeholder="https://linkedin.com/in/yourprofile">
                                </div>

                                <div>
                                    <label class="block text-sm font-semibold text-slate-700 mb-2">Cover Letter</label>
                                    <textarea x-model="formData.coverLetter" rows="4" 
                                              class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-orange-500 focus:border-orange-500 resize-vertical" 
                                              placeholder="Why you're perfect for this {{ $career->title }} role..."></textarea>
                                </div>

                                <button type="submit" 
                                        class="w-full bg-gradient-to-r from-orange-500 to-red-500 text-white font-bold py-4 px-6 rounded-2xl shadow-xl hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300 text-lg">
                                    <span class="material-icons mr-2">send</span>
                                    Send Application
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-24">
                <span class="material-icons text-6xl text-slate-300 mb-6 block mx-auto">work_off</span>
                <h3 class="text-2xl font-black text-slate-600 mb-4">No Open Positions</h3>
                <p class="text-slate-600 max-w-md mx-auto mb-8">We're not hiring right now, but we'll post new opportunities soon.</p>
                <a href="mailto:sheteom28@gmail.com?subject=General%20Job%20Inquiry&body=Hi%20Team,%0A%0AI'd%20love%20to%20work%20with%20Ventar.%20Please%20keep%20me%20posted%20on%20new%20openings."
                   class="bg-orange-500 text-white font-bold px-8 py-4 rounded-2xl shadow-xl hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300 inline-flex items-center">
                    <span class="material-icons mr-2">email</span>
                    Email Us Anyway
                </a>
            </div>
        @endif
    </div>
</section>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
<script>
function careerForm(jobTitle, jobLocation, jobType) {
    return {
        showForm: false,
        jobTitle: jobTitle,
        jobLocation: jobLocation,
        jobType: jobType,
        formData: { name: '', email: '', phone: '', portfolio: '', coverLetter: '' },
        loading: false,
        
        submitApplication() {
            console.log('Form data:', this.formData); // DEBUG
            
            if (!this.formData.name.trim() || !this.formData.email.trim()) {
                alert('Please fill Name and Email!');
                return;
            }

            this.loading = true;
            
            const submitData = new FormData();
            submitData.append('_token', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
            submitData.append('name', this.formData.name.trim());
            submitData.append('email', this.formData.email.trim());
            submitData.append('phone', this.formData.phone || '');
            submitData.append('portfolio', this.formData.portfolio || '');
            submitData.append('cover_letter', this.formData.coverLetter || '');
            submitData.append('job_title', this.jobTitle);
            submitData.append('job_location', this.jobLocation);
            submitData.append('job_type', this.jobType);

            console.log('Sending to /careers/apply'); // DEBUG

            fetch('/careers/apply', {
                method: 'POST',
                body: submitData
            })
            .then(response => {
                console.log('Response status:', response.status); // DEBUG
                return response.json();
            })
            .then(data => {
                console.log('Response data:', data); // DEBUG
                if (data.success) {
                    alert(data.message);
                    this.resetForm();
                } else {
                    alert('Error: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Fetch error:', error);
                alert('Network error. Check console.');
            })
            .finally(() => {
                this.loading = false;
            });
        },
        
        resetForm() {
            this.formData = { name: '', email: '', phone: '', portfolio: '', coverLetter: '' };
            this.showForm = false;
        }
    }
}
</script>
@endpush

