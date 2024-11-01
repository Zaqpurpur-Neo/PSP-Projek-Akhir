<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\BlogPost;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        //

    $blogCategories = [
        ["nama" => "PHP", "slug" => "php"],
        ["nama" => "JavaScript", "slug" => "javascript"],
        ["nama" => "Python", "slug" => "python"],
        ["nama" => "Java", "slug" => "java"],
        ["nama" => "C++", "slug" => "c-plus-plus"],
        ["nama" => "Ruby", "slug" => "ruby"],
        ["nama" => "Swift", "slug" => "swift"],
        ["nama" => "Go", "slug" => "go"],
        ["nama" => "Kotlin", "slug" => "kotlin"],
        ["nama" => "Rust", "slug" => "rust"],
        ["nama" => "Frontend Development", "slug" => "frontend-development"],
        ["nama" => "Backend Development", "slug" => "backend-development"],
        ["nama" => "Full Stack Development", "slug" => "full-stack-development"],
        ["nama" => "APIs & Web Services", "slug" => "apis-web-services"],
        ["nama" => "Web Frameworks", "slug" => "web-frameworks"],
        ["nama" => "Responsive Design", "slug" => "responsive-design"],
        ["nama" => "iOS Development", "slug" => "ios-development"],
        ["nama" => "Android Development", "slug" => "android-development"],
        ["nama" => "Cross-Platform Development", "slug" => "cross-platform-development"],
        ["nama" => "Mobile App Design", "slug" => "mobile-app-design"],
        ["nama" => "App Performance Optimization", "slug" => "app-performance-optimization"],
        ["nama" => "Software Architecture", "slug" => "software-architecture"],
        ["nama" => "Code Optimization", "slug" => "code-optimization"],
        ["nama" => "Testing & QA", "slug" => "testing-qa"],
        ["nama" => "DevOps & CI/CD", "slug" => "devops-ci-cd"],
        ["nama" => "Version Control (Git)", "slug" => "version-control-git"],
        ["nama" => "Debugging & Troubleshooting", "slug" => "debugging-troubleshooting"],
        ["nama" => "Machine Learning", "slug" => "machine-learning"],
        ["nama" => "Data Analysis", "slug" => "data-analysis"],
        ["nama" => "Data Visualization", "slug" => "data-visualization"],
        ["nama" => "Big Data", "slug" => "big-data"],
        ["nama" => "AI & Neural Networks", "slug" => "ai-neural-networks"],
        ["nama" => "Natural Language Processing", "slug" => "natural-language-processing"],
        ["nama" => "AWS", "slug" => "aws"],
        ["nama" => "Azure", "slug" => "azure"],
        ["nama" => "Google Cloud", "slug" => "google-cloud"],
        ["nama" => "Serverless Architecture", "slug" => "serverless-architecture"],
        ["nama" => "Cloud Security", "slug" => "cloud-security"],
        ["nama" => "Kubernetes & Containerization", "slug" => "kubernetes-containerization"],
        ["nama" => "Network Security", "slug" => "network-security"],
        ["nama" => "Application Security", "slug" => "application-security"],
        ["nama" => "Encryption & Cryptography", "slug" => "encryption-cryptography"],
        ["nama" => "Ethical Hacking", "slug" => "ethical-hacking"],
        ["nama" => "Threat Detection & Response", "slug" => "threat-detection-response"],
        ["nama" => "React", "slug" => "react"],
        ["nama" => "Angular", "slug" => "angular"],
        ["nama" => "Vue.js", "slug" => "vue-js"],
        ["nama" => "Laravel", "slug" => "laravel"],
        ["nama" => "Django", "slug" => "django"],
        ["nama" => "Spring Boot", "slug" => "spring-boot"],
        ["nama" => "Flask", "slug" => "flask"],
        ["nama" => "Node.js", "slug" => "node-js"],
        ["nama" => "Blockchain", "slug" => "blockchain"],
        ["nama" => "Augmented Reality", "slug" => "augmented-reality"],
        ["nama" => "Virtual Reality", "slug" => "virtual-reality"],
        ["nama" => "Internet of Things (IoT)", "slug" => "internet-of-things-iot"],
        ["nama" => "Quantum Computing", "slug" => "quantum-computing"],
        ["nama" => "Web Programming", "slug" => "web-programming"],
        ["nama" => "Edge Computing", "slug" => "edge-computing"],
        ["nama" => "Web Design", "slug" => "web-design"],
        ["nama" => "Web Personal", "slug" => "web-personal"]
    ];

       foreach ($blogCategories as $blog) {
            Category::create($blog);
       }


       Category::create([
           "nama" => "Web Programming",
           "slug" => "web-programming"
       ]);

       Category::create([
           "nama" => "Web Design",
           "slug" => "web-design"
       ]);

       Category::create([
           "nama" => "Web Personal",
           "slug" => "web-personal"
       ]);
       BlogPost::factory(80)->create();
    }
}
