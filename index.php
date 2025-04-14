<?php
require_once 'includes/auth.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Volunteer Management System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .text-gradient {
            background: linear-gradient(to right, #b45309, #fbbf24);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .card-hover {
            transition: all 0.3s ease;
        }
        .card-hover:hover {
            transform: translateY(-10px);
        }
    </style>
</head>
<body class="bg-yellow-50">
    <nav class="bg-yellow-700 text-white shadow-lg sticky top-0 z-50">
        <div class="max-w-6xl mx-auto px-4">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="/soemone" class="font-bold text-2xl flex items-center">
                        <i class="fas fa-hands-helping mr-2 text-2xl"></i>
                        <span class="text-yellow-200">Spark</span><span class="text-white font-black">services</span>
                    </a>
                </div>
                <div class="hidden md:flex items-center space-x-4">
                    <?php if(isLoggedIn()): ?>
                        <a href="/soemone/pages/volunteers/dashboard.php" class="hover:text-yellow-200 transition-colors duration-200 flex items-center">
                            <i class="fas fa-tachometer-alt mr-1"></i> Dashboard
                        </a>
                        <a href="/soemone/pages/volunteers/events.php" class="hover:text-yellow-200 transition-colors duration-200 flex items-center">
                            <i class="fas fa-calendar-alt mr-1"></i> Events
                        </a>
                        <a href="/soemone/pages/volunteers/donations.php" class="hover:text-yellow-200 transition-colors duration-200 flex items-center">
                            <i class="fas fa-hand-holding-usd mr-1"></i> Donations
                        </a>
                        <!-- <a href="/soemone/pages/volunteers/hours.php" class="hover:text-yellow-200 transition-colors duration-200 flex items-center">
                            <i class="fas fa-clock mr-1"></i> Hours
                        </a> -->
                        <a href="/soemone/pages/volunteers/volunteers.php" class="hover:text-yellow-200 transition-colors duration-200 flex items-center">
                            <i class="fas fa-users mr-1"></i> Volunteers
                        </a>
                        <?php if(isAdmin()): ?>
                            <a href="/soemone/pages/admin/dashboard.php" class="hover:text-yellow-200 transition-colors duration-200 flex items-center">
                                <i class="fas fa-user-shield mr-1"></i> Admin
                            </a>
                        <?php endif; ?>
                        <a href="/soemone/logout.php" class="hover:text-yellow-200 transition-colors duration-200 flex items-center">
                            <i class="fas fa-sign-out-alt mr-1"></i> Logout
                        </a>
                    <?php else: ?>
                        <a href="/soemone/login.php" class="px-4 py-2 rounded-md bg-yellow-600 hover:bg-yellow-500 transition-colors duration-200 shadow-lg flex items-center">
                            <i class="fas fa-sign-in-alt mr-1"></i> Login
                        </a>
                        <a href="/soemone/register.php" class="px-4 py-2 rounded-md bg-white text-yellow-700 hover:bg-yellow-100 transition-colors duration-200 shadow-lg flex items-center">
                            <i class="fas fa-user-plus mr-1"></i> Register
                        </a>
                    <?php endif; ?>
                </div>
                <div class="md:hidden flex items-center">
                    <button class="text-white focus:outline-none">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </div>
        </div>
    </nav>
    <div style="background-image: url('i3.png'); background-size: cover; background-position: center; position: relative; min-height: 600px;">
    <div style="position: absolute; top: 0; right: 0; bottom: 0; left: 0; background-color: rgba(0, 0, 0, 0.65);"></div>
        <div style="position: relative; z-index: 10; max-width: 1280px; margin: 0 auto; padding: 64px 16px; text-align: center; color: white;">
        <h1 class="text-5xl font-extrabold mb-2 leading-tight mt-8">
        <span class="block text-6xl text-left ml-4 mt-16">Make a</span>
        <span class="block text-6xl text-yellow-700 text-left ml-4">Difference Today</span>
        </h1>
        <p class="mx-auto max-w-lg text-base text-yellow-700 font-normal text-left ml-4 italic">
        "Join our community of volunteers and donors making a positive impact in the world."
        </p>

            <?php if(!isLoggedIn()): ?>
            <div class="mt-8 flex flex-col sm:flex-row gap-4 justify-center">
                <a href="/soemone/register.php" class="inline-flex items-center mt-4 justify-start px-6 py-3 bg-yellow-700 text-white rounded-lg hover:bg-yellow-600 transition shadow-lg">
                    <i class="fas fa-hands-helping mr-2"></i> Get Started
                </a>
                <a href="#learn-more" class="inline-flex mt-4 items-center justify-start px-6 py-3 bg-transparent border border-yellow-700 text-yellow-700 rounded-lg hover:bg-yellow-800 hover:bg-opacity-30 transition">
                    <i class="fas fa-info-circle mr-2"></i> Learn More
                </a>
            </div>
            <?php endif; ?>
        </div>
    </div>
    </section>
    <div class="bg-yellow-50 py-12">
        <div class="max-w-6xl mx-auto px-4">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300">
                    <div class="text-4xl font-bold text-yellow-700">5,000+</div>
                    <div class="text-gray-600 mt-1 text-sm font-medium">Active Volunteers</div>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300">
                    <div class="text-4xl font-bold text-yellow-700">350+</div>
                    <div class="text-gray-600 mt-1 text-sm font-medium">Community Partners</div>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300">
                    <div class="text-4xl font-bold text-yellow-700">120K+</div>
                    <div class="text-gray-600 mt-1 text-sm font-medium">Volunteer Hours</div>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300">
                    <div class="text-4xl font-bold text-yellow-700">$2.5M</div>
                    <div class="text-gray-600 mt-1 text-sm font-medium">Funds Raised</div>
                </div>
            </div>
        </div>
    </div>
    <div id="learn-more" class="bg-white py-12">
        <div class="max-w-6xl mx-auto px-4">
            <div class="text-center mb-10">
                <h2 class="text-3xl font-bold text-yellow-700">Features <span class="text-gradient">That Empower</span></h2>
                <p class="mt-2 text-gray-600 italic">Everything you need to manage volunteers and make an impact</p>
            </div>
            <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
                <div class="bg-yellow-50 p-6 rounded-lg shadow-md border-l-4 border-yellow-700">
                    <div class="text-center mb-4">
                        <div class="inline-flex items-center justify-center p-3 rounded-full bg-yellow-100 text-yellow-700">
                            <i class="fas fa-users text-2xl"></i>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-yellow-700 mb-2 text-center">Volunteer Management</h3>
                    <p class="text-gray-600 text-center text-sm">Efficiently manage volunteers, track hours, and coordinate events with our intuitive dashboard.</p>
                </div>
                <div class="bg-yellow-50 p-6 rounded-lg shadow-md border-l-4 border-yellow-700">
                    <div class="text-center mb-4">
                        <div class="inline-flex items-center justify-center p-3 rounded-full bg-yellow-100 text-yellow-700">
                            <i class="fas fa-hand-holding-usd text-2xl"></i>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-yellow-700 mb-2 text-center">Donation Tracking</h3>
                    <p class="text-gray-600 text-center text-sm">Securely process donations, generate reports, and manage fundraising campaigns.</p>
                </div>
                <div class="bg-yellow-50 p-6 rounded-lg shadow-md border-l-4 border-yellow-700">
                    <div class="text-center mb-4">
                        <div class="inline-flex items-center justify-center p-3 rounded-full bg-yellow-100 text-yellow-700">
                            <i class="fas fa-chart-line text-2xl"></i>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-yellow-700 mb-2 text-center">Impact Reporting</h3>
                    <p class="text-gray-600 text-center text-sm">Measure and visualize your organization's impact with detailed analytics.</p>
                </div>
            </div>
        </div>
    </div>

    <section class="py-12 bg-yellow-50">
        <div class="max-w-6xl mx-auto px-4">
            <div class="text-center mb-10">
                <h2 class="text-3xl font-bold text-yellow-700">Featured <span class="text-gradient">Projects</span></h2>
                <p class="mt-2 text-gray-600 italic">Discover how your support transforms lives through our initiatives</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white rounded-lg shadow-md overflow-hidden card-hover">
                    <div class="relative h-48">
                        <img src="a1.jpeg" alt="Education" class="w-full h-full object-cover">
                        <div class="absolute top-2 right-2 bg-yellow-700 text-white text-xs font-bold px-2 py-1 rounded-full">Education</div>
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-bold text-yellow-700">"Step Forward, Create Change"</h3>
                        <p class="text-sm text-gray-600 mt-2">
                            "Real change begins when you step forward to help. Your support empowers others to rise above their circumstances."
                        </p>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-md overflow-hidden card-hover">
                    <div class="relative h-48">
                        <img src="a9.jpeg" alt="Community" class="w-full h-full object-cover">
                        <div class="absolute top-2 right-2 bg-yellow-700 text-white text-xs font-bold px-2 py-1 rounded-full">Community</div>
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-bold text-yellow-700">"Life-Changing Movement"</h3>
                        <p class="text-sm text-gray-600 mt-2">
                            "Every volunteer and donor has a story — a story that connects us to the very heart of the community."
                        </p>
                    </div>
                </div>
                
                <div class="bg-white rounded-lg shadow-md overflow-hidden card-hover">
                    <div class="relative h-48">
                        <img src="a6.jpeg" alt="Empowerment" class="w-full h-full object-cover">
                        <div class="absolute top-2 right-2 bg-yellow-700 text-white text-xs font-bold px-2 py-1 rounded-full">Empowerment</div>
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-bold text-yellow-700">"Empowering Resilience"</h3>
                        <p class="text-sm text-gray-600 mt-2">
                            "In every act of service, there is a story of resilience. By donating your time or resources, you're helping to write a new chapter of hope."
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="bg-white py-12">
        <div class="max-w-6xl mx-auto px-4">
            <div class="text-center mb-10">
                <h2 class="text-3xl font-bold text-yellow-700">What Our <span class="text-gradient">Community Says</span></h2>
                <p class="mt-2 text-gray-600 italic">Hear from volunteers and organizations</p>
            </div>
            <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
                <div class="bg-yellow-50 p-6 rounded-lg shadow-md">
                    <div class="flex items-center mb-4">
                        <img src="p4.jpeg" alt="Testimonial author" class="w-10 h-10 rounded-full mr-3">
                        <div>
                            <h4 class="font-bold text-yellow-700">Sarah Singh</h4>
                            <p class="text-gray-600 text-xs">Volunteer Coordinator</p>
                        </div>
                    </div>
                    <p class="text-gray-600 text-sm italic">"VolunteerHub has streamlined our entire process. We've increased volunteer retention by 45% since implementing this platform!"</p>
                    <div class="mt-3 text-yellow-500">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
                <div class="bg-yellow-50 p-6 rounded-lg shadow-md">
                    <div class="flex items-center mb-4">
                        <img src="p3.jpeg" alt="Testimonial author" class="w-10 h-10 rounded-full mr-3">
                        <div>
                            <h4 class="font-bold text-yellow-700">Gourav singhania</h4>
                            <p class="text-gray-600 text-xs">Nonprofit Director</p>
                        </div>
                    </div>
                    <p class="text-gray-600 text-sm italic">"The donation tracking feature has revolutionized our fundraising efforts. We can now focus more on our mission and less on paperwork."</p>
                    <div class="mt-3 text-yellow-500">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
                <div class="bg-yellow-50 p-6 rounded-lg shadow-md">
                    <div class="flex items-center mb-4">
                        <img src="p2.jpeg" alt="Testimonial author" class="w-10 h-10 rounded-full mr-3">
                        <div>
                            <h4 class="font-bold text-yellow-700">Yash Raj</h4>
                            <p class="text-gray-600 text-xs">Event Organizer</p>
                        </div>
                    </div>
                    <p class="text-gray-600 text-sm italic">"Managing events has never been easier. The platform's intuitive interface helps us coordinate volunteers efficiently across multiple locations."</p>
                    <div class="mt-3 text-yellow-500">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="bg-yellow-700 text-white py-10">
        <div class="max-w-6xl mx-auto px-4">
            <div class="flex flex-col md:flex-row items-center justify-between">
                <div class="md:w-2/3 mb-6 md:mb-0">
                    <h2 class="text-2xl font-bold">Ready to make an impact?</h2>
                    <p class="mt-2 text-yellow-200">Join thousands of volunteers and organizations already using VolunteerHub.</p>
                </div>
                <div class="md:w-1/3 flex justify-center">
                    <?php if(!isLoggedIn()): ?>
                    <a href="/soemone/register.php" class="px-6 py-3 bg-white text-yellow-700 rounded-lg hover:bg-yellow-100 shadow-lg transition flex items-center">
                        <i class="fas fa-rocket mr-2"></i> Get Started Now
                    </a>
                    <?php else: ?>
                    <a href="/soemone/pages/volunteers/dashboard.php" class="px-6 py-3 bg-white text-yellow-700 rounded-lg hover:bg-yellow-100 shadow-lg transition flex items-center">
                        <i class="fas fa-tachometer-alt mr-2"></i> Go to Dashboard
                    </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Blog Section -->
    <section class="py-12 bg-yellow-50">
        <div class="max-w-6xl mx-auto px-4">
            <div class="text-center mb-10">
                <h3 class="text-3xl font-bold text-yellow-700">Our <span class="text-gradient">Impact</span></h3>
                <p class="mt-2 text-gray-600 italic">Making a difference in communities around the world</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white p-6 rounded-lg shadow-md text-gray-900 card-hover">
                    <div class="text-yellow-700 mb-3 text-3xl">
                        <i class="fas fa-hand-holding-heart"></i>
                    </div>
                    <h4 class="text-xl font-bold mb-3 text-yellow-700">Why Every Donation Matters</h4>
                    <p class="text-gray-600 text-sm">
                        "A single act of kindness can change someone's life. This blog shares real stories of how donations helped underprivileged families and provided education to children in need."
                    </p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md text-gray-900 card-hover">
                    <div class="text-yellow-700 mb-3 text-3xl">
                        <i class="fas fa-hand-holding-heart"></i>
                    </div>
                    <h4 class="text-xl font-bold mb-3 text-yellow-700">The Art of Fundraising</h4>
                    <p class="text-gray-600 text-sm">
                        "Fundraising is more than just collecting money—it's about inspiring people to support a meaningful cause. Having a strong strategy can make a huge difference."
                    </p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md text-gray-900 card-hover">
                    <div class="text-yellow-700 mb-3 text-3xl">
                        <i class="fas fa-hand-holding-heart"></i>
                    </div>
                    <h4 class="text-xl font-bold mb-3 text-yellow-700">Volunteer Experience</h4>
                    <p class="text-gray-600 text-sm">
                        "Volunteering not only benefits those in need but also helps you grow as a person. It fosters gratitude, improves skills, and gives a sense of fulfillment beyond your daily routine."
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="py-12 bg-white px-4">
        <div class="max-w-6xl mx-auto flex flex-col md:flex-row items-center">
            <div class="md:w-1/2 mb-6 md:mb-0">
                <img src="img.jpeg" alt="Volunteers" class="shadow-lg rounded-lg">
            </div>
            <div class="md:w-1/2 md:pl-10">
                <h3 class="text-3xl font-bold text-yellow-700 mb-4">Give yourself <span class="text-gradient">A chance</span></h3>
                <p class="text-gray-700 mb-6">
                     Our plans are designed to fulfill all of your specific fundraising needs in one system. That's why nonprofits
                      raise 25% more funds in their first year with us. As your operations grow, you're free to add more tools to meet new goals.
                </p>
                <a href="#" class="bg-yellow-700 text-white font-bold py-2 px-5 rounded-lg hover:bg-yellow-600 transition inline-flex items-center">
                    <span>More About Us</span>
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
    </section>
  
    <!-- Footer -->
    <footer class="bg-yellow-800 text-white py-8 text-center">
        <div class="max-w-6xl mx-auto px-4 grid grid-cols-1 md:grid-cols-3 gap-8">
          <div>
            <h3 class="text-lg font-semibold mb-3">About Us</h3>
            <p class="text-sm text-yellow-200 italic">
            We are ready to provide better service to make the world happy. This commitment reflects our 
            core belief that true success lies in the joy and well-being of others. By continuously
             improving our services, listening to the needs of our community, and acting with empathy and purpose,
              we aim to make a positive impact—one person at a time.            
            </p>
          </div>
          <div>
            <h3 class="text-lg font-semibold mb-3">Quick Links</h3>
            <ul class="space-y-1 text-sm text-yellow-200">
              <li><a href="#" class="hover:text-white transition">Home</a></li>
              <li><a href="#" class="hover:text-white transition">Services</a></li>
              <li><a href="#" class="hover:text-white transition">Contact</a></li>
              <li><a href="#" class="hover:text-white transition">Privacy Policy</a></li>
            </ul>
          </div>
          <div>
            <h3 class="text-lg font-semibold mb-3">Follow Us</h3>
            <div class="flex space-x-4 justify-center">
  <a href="https://twitter.com/YOUR_PROFILE" target="_blank" class="hover:text-yellow-300 transition">
    <i class="fab fa-twitter"></i>
  </a>
  <a href="https://www.facebook.com/YOUR_PAGE" target="_blank" class="hover:text-yellow-300 transition">
    <i class="fab fa-facebook"></i>
  </a>
  <a href="https://www.instagram.com/harleennnn_.05" target="_blank" class="hover:text-yellow-300 transition">
    <i class="fab fa-instagram"></i>
  </a>
  <a href="https://www.linkedin.com/in/harleen-kumari-267ab928a" target="_blank" class="hover:text-yellow-300 transition">
    <i class="fab fa-linkedin"></i>
  </a>
</div>

          </div>
        </div>
        <div class="mt-8 text-sm text-yellow-200">
          &copy; 2025 Sparkservices. All rights reserved.
        </div>
    </footer>
</body>
</html>