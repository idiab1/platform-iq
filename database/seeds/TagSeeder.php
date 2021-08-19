<?php

use App\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            [
                "name" => 'javascript',
                'tag_info' => "Once relegated to the browser as one of the 3 core technologies of the web, JavaScript can now be found almost anywhere you find code.
                            JavaScript developers move fast and push software development forward; they can be as opinionated as the frameworks they use, so let's keep it clean here and make it a place to learn from each other!",
            ],
            [
                "name" => "webdev",
                "tag_info" => "",
            ],
            [
                "name" => "beginners",
                "tag_info" => "'A journey of a thousand miles begins with a single step.' -Chinese Proverb",
            ],
            [
                "name" => "react",
                "tag_info" => "Official tag for Facebook's React JavaScript library for building user interfaces",
            ],
            [
                "name" => "programming",
                "tag_info" => "",
            ],
            [
                "name" => "tutorial",
                "tag_info" => "Tutorial is a general purpose tag. We welcome all types of tutorial - code related or not! It's all about learning, and using tutorials to teach others!",
            ],
            [
                "name" => "python",
                "tag_info" => "",
            ],
            [
                "name" => "css",
                "tag_info" => "Cascading Style Sheets (CSS) is a simple language for adding style (e.g., fonts, colors, spacing) to HTML documents. It describes how HTML elements should be displayed.",
            ],
            [
                "name" => "codenewbie",
                "tag_info" => "The most supportive community of programmers and people learning to code.",
            ],
            [
                "name" => "node",
                "tag_info" => "",
            ],
            [
                "name" => "html",
                "tag_info" => "",
            ],
            [
                "name" => "devops",
                "tag_info" => "Content centering around the shifting left of responsibility, deconstruction of responsibility silos, and the automation of repetitive work tasks.",
            ],
            [
                "name" => "productivity",
                "tag_info" => "Productivity includes tips on how to use tools and software, process optimization, useful references, experience, and mindstate optimization.",
            ],
            [
                "name" => "career",
                "tag_info" => "This tag is for anything relating to careers! Job offers, workplace conflict, interviews, resumes, promotions, etc.",
            ],
            [
                "name" => "aws",
                "tag_info" => "Amazon Web Services (AWS) is a collection of web-services for computing, storage, machine learning, security, and more There are over 150+ AWS service with new services being announced yearly.",
            ],
            [
                "name" => "android",
                "tag_info" => "",
            ],
            [
                "name" => "discuss",
                "tag_info" => "What color should the bike shed be?",
            ],
            [
                "name" => "typescript",
                "tag_info" => "Optional static type-checking for JavaScript.",
            ],
            [
                "name" => "java",
                "tag_info" => "",
            ],
            [
                "name" => "github",
                "tag_info" => "",
            ],
            [
                "name" => "php",
                "tag_info" => "Home for all the PHP-related posts",
            ],
            [
                "name" => "showdev",
                "tag_info" => "Show off what you've built!",
            ],
            [
                "name" => "security",
                "tag_info" => "",
            ],
            [
                "name" => "linux",
                "tag_info" => "What are clouds made of? Linux servers, mostly.",
            ],
            [
                "name" => "testing",
                "tag_info" => "",
            ],
            [
                "name" => "docker",
                "tag_info" => "Stories about Docker as a technology (containers, CLI, Engine) or company (Docker Hub, Docker Swarm).",
            ],
            [
                "name" => "angular",
                "tag_info" => "One of the world's most popular frontend JavaScript frameworks.",
            ],
            [
                "name" => "opensource",
                "tag_info" => "May The Source Be With You! Articles about Open Source and Free Software as a philosophy, and its application to software development and project management.",
            ],
            [
                "name" => "vue",
                "tag_info" => "Official tag for the Vue.js JavaScript Framework",
            ],
            [
                "name" => "cloud",
                "tag_info" => "There is no cloud, only other peoples computers.",
            ],
            [
                "name" => "machinelearning",
                "tag_info" => "",
            ],
            [
                "name" => "git",
                "tag_info" => "",
            ],
            [
                "name" => "database",
                "tag_info" => "Posts on building, using, and learning about databases.",
            ],
            [
                "name" => "computerscience",
                "tag_info" => "This tag is for sharing and asking questions about anything related to computer science, including data structures, algorithms, research, and white papers! 🤓",
            ],
            [
                "name" => "archlinux",
                "tag_info" => "",
            ],
            [
                "name" => "laravel",
                "tag_info" => "",
            ],
            [
                "name" => "100daysofcode",
                "tag_info" => "The 100 Days of Code is a coding challenge created by Alexander Kallaway to encourage people to learn new coding skills.
",
            ],
            [
                "name" => "datascience",
                "tag_info" => "Data Science allows us to extract meaning from and interpret data.",
            ],
            [
                "name" => "dotnet",
                "tag_info" => "",
            ],
            [
                "name" => "csharp",
                "tag_info" => "Official tag for the C# programming language.",
            ],
            [
                "name" => "kubernetes",
                "tag_info" => "",
            ],
            [
                "name" => "codepen",
                "tag_info" => "",
            ],
            [
                "name" => "ruby",
                "tag_info" => "This tag is for posts related to the Ruby language, including its libraries.",
            ],
            [
                "name" => "flutter",
                "tag_info" => "",
            ],
            [
                "name" => "go",
                "tag_info" => "",
            ],
            [
                "name" => "serverless",
                "tag_info" => "All computing — without servers!",
            ],
            [
                "name" => "algorithms",
                "tag_info" => "Heap, Binary Tree, Data Structure it doesn't matter. This tag should be used for anything Algorithm & Data Structure focused.",
            ],
            [
                "name" => "startup",
                "tag_info" => "",
            ],
            [
                "name" => "mobile",
                "tag_info" => "",
            ],
            [
                "name" => "reactnative",
                "tag_info" => "",
            ],
            [
                "name" => "rails",
                "tag_info" => "Ruby on Rails is a popular web framework that happens to power ",
            ],
            [
                "name" => "help",
                "tag_info" => "A place to ask questions and provide answers. We're here to work things out together.",
            ],
            [
                "name" => "blockchain",
                "tag_info" => "",
            ],
            [
                "name" => "sql",
                "tag_info" => "Posts on tips and tricks, using and learning about SQL for database development and analysis.",
            ],
            [
                "name" => "azure",
                "tag_info" => "The dev.to tag for Microsoft Azure, the Cloud Computing Platform.",
            ],
            [
                "name" => "vscode",
                "tag_info" => "",
            ],
            [
                "name" => "architecture",
                "tag_info" => "",
            ],
            [
                "name" => "news",
                "tag_info" => "Expect to see announcements of new and updated products, services, and features for languages & frameworks. You also will find high-level news relevant to the tech and software development industry covered here.",
            ],
            [
                "name" => "ios",
                "tag_info" => "This tag is for anything related to Apple's iOS devices, operating system, and development environment. Development, usage, apps, tips, requests for help: if it's related to iOS it's welcome here!",
            ],
            [
                "name" => "django",
                "tag_info" => "Django is a high-level Python Web framework that encourages rapid development and clean, pragmatic design. Built by experienced developers, it takes care of much of the hassle of Web development, so you can focus on writing your app without needing to reinvent the wheel. It’s free and open source.",
            ],
            [
                "name" => "learning",
                "tag_info" => "",
            ],
            [
                "name" => "wordpress",
                "tag_info" => "",
            ],
            [
                "name" => "coding",
                "tag_info" => "",
            ],
            [
                "name" => "nextjs",
                "tag_info" => "Next.js gives you hybrid static and server rendering, TypeScript support, smart bundling, route pre-fetching, and more. No config needed.",
            ],
            [
                "name" => "cpp",
                "tag_info" => "Official tag for the C++ programming language.",
            ],
            [
                "name" => "challenge",
                "tag_info" => "",
            ],
            [
                "name" => "development",
                "tag_info" => "",
            ],
            [
                "name" => "gamedev",
                "tag_info" => "",
            ],
            [
                "name" => "kotlin",
                "tag_info" => "",
            ],
            [
                "name" => "ux",
                "tag_info" => "User Experience tips, tricks, discussions, and more!",
            ],
            [
                "name" => "codequality",
                "tag_info" => "",
            ],
            [
                "name" => "performance",
                "tag_info" => "Tag for content related to software performance.",
            ],
            [
                "name" => "redux",
                "tag_info" => "",
            ],
            [
                "name" => "frontend",
                "tag_info" => "",
            ],
            [
                "name" => "graphql",
                "tag_info" => "GraphQL is a query language and execution engine for client‐server applications",
            ],
            [
                "name" => "watercooler",
                "tag_info" => "Light, and offtopic conversation.",
            ],
            [
                "name" => "api",
                "tag_info" => "",
            ],
            [
                "name" => "npm",
                "tag_info" => "",
            ],
            [
                "name" => "devjournal",
                "tag_info" => "Dear Diary...",
            ],
            [
                "name" => "mongodb",
                "tag_info" => "",
            ],
            [
                "name" => "firebase",
                "tag_info" => "Firebase helps you build and run successful apps. It offers products and solutions you can rely on through your app's journey.",
            ],
            [
                "name" => "functional",
                "tag_info" => "",
            ],
            [
                "name" => "writing",
                "tag_info" => "",
            ],
            [
                "name" => "motivation",
                "tag_info" => "",
            ],
            [
                "name" => "tailwindcss",
                "tag_info" => "A utility-first CSS framework",
            ],
            [
                "name" => "rust",
                "tag_info" => "This tag is for posts related to the Rust programming language, including its libraries.",
            ],
            [
                "name" => "dart",
                "tag_info" => "On the language, SDK and ecosystem.",
            ],
            [
                "name" => "bash",
                "tag_info" => "",
            ],
            [
                "name" => "postgres",
                "tag_info" => "Posts on tips and tricks, using and learning about PostgreSQL for database development and analysis.",
            ],
            [
                "name" => "todayilearned",
                "tag_info" => "Summarize a concept that is new to you.",
            ],
            [
                "name" => "ai",
                "tag_info" => "",
            ],
            [
                "name" => "ubuntu",
                "tag_info" => "Canonical, Ubuntu, Linux and related technology.",
            ],
            [
                "name" => "code",
                "tag_info" => "",
            ],
            [
                "name" => "a11y",
                "tag_info" => "",
            ],
            [
                "name" => "technology",
                "tag_info" => "",
            ],
            [
                "name" => "agile",
                "tag_info" => "Agile! A iterative and time boxed approach to software development where you build software incrementally from the start instead of trying to deliver all at once.",
            ],
            [
                "name" => "webpack",
                "tag_info" => "",
            ],
            [
                "name" => "deeplearning",
                "tag_info" => "This tag is for discussing, sharing articles, and asking questions primarily on deep learning - a subfield of machine learning.",
            ],
            [
                "name" => "remote",
                "tag_info" => "",
            ],
            [
                "name" => "terraform",
                "tag_info" => "All subjects concerning Hashicorp's IaC tool `Terraform`.",
            ],

        ];

        foreach ($tags as $tag) {
            Tag::create([
                'tag' => $tag['name'],
                'tag_info' => $tag['tag_info'],
            ]);
        }
    }
}
