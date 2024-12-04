<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Notifications;  // Corrected to Notifications

class OnlineResourceController extends Controller
{
    public function index()
    {
        // Fetch all notifications for all users
        $notifications = Notifications::all();  // Corrected to Notifications

        // Online resources data
        $resources = [
            [
                'url' => 'https://www.youtube.com/watch?v=QUjYy4Ksy1E',
                'thumbnail' => 'images/thumbnail/gifted.png',
                'title' => 'Why Gifted Kids Are Actually Special Needs'
            ],
            [
                'url' => 'https://www.youtube.com/watch?v=mpRRix8m4SQ',
                'thumbnail' => 'images/thumbnail/porn-consumption.png',
                'title' => 'How Years of Porn Consumption Affects Brain\'s Ability to Form Relationships'
            ],
            [
                'url' => 'https://www.youtube.com/watch?v=NuHEY7CjjTI',
                'thumbnail' => 'images/thumbnail/purpose.png',
                'title' => 'Why Finding Purpose Is SO HARD Today'
            ],
            [
                'url' => 'https://www.youtube.com/watch?v=qoR72-aM4mI&ab_channel=HealthyGamerGG',
                'thumbnail' => 'images/thumbnail/brainfog.png',
                'title' => 'Why Your Brain Fog Never Goes Away (and How To Get Clarity)'
            ],
            [
                'url' => 'https://www.youtube.com/watch?v=6CWq8wyS90o&ab_channel=HealthyGamerGG',
                'thumbnail' => 'images/thumbnail/dopamine.png',
                'title' => 'The Secret Behind Resisting Dopamine'
            ],
            // Add more resources...
        ];

        // Articles data
        $articles = [
            [
                'title' => 'What is mental health?',
                'excerpt' => 'Mental health is about how people think, feel, and behave. Mental health care professionals can help people manage conditions such as depression, anxiety, bipolar disorder, addiction, and other disorders that affect their thoughts, feelings, and behaviors.',
                'url' => 'https://www.medicalnewstoday.com/articles/154543',
            ],
            [
                'title' => 'The Importance of Mental Health Awareness',
                'excerpt' => 'Mental illnesses affect 19% of the adult population, 46% of teenagers and 13% of children each year. People struggling with their mental health may be in your family, live next door, teach your children, work in the next cubicle or sit in the same church pew.',
                'url' => 'https://www.pinerest.org/newsroom/articles/mental-health-awareness-blog/',
            ],
            [
                'title' => 'Caring for Your Mental Health',
                'excerpt' => 'Mental health includes emotional, psychological, and social well-being. It is more than the absence of a mental illness—it’s essential to your overall health and quality of life. Self-care can play a role in maintaining your mental health and help support your treatment and recovery if you have a mental illness.',
                'url' => 'https://www.nimh.nih.gov/health/topics/caring-for-your-mental-health',
            ],
            [
                'title' => 'How to Improve Mental Health',
                'excerpt' => 'Mental health includes our emotional, psychological, and social well-being. It affects how we think, feel, and act as we cope with life. It also helps determine how we handle stress, relate to others, and make choices. Mental health is important at every stage of life, from childhood and adolescence through adulthood and aging.',
                'url' => 'https://medlineplus.gov/howtoimprovementalhealth.html',
            ],
            [
                'title' => 'The Importance of Mental Health Awareness Month',
                'excerpt' => 'Mental Health Awareness Month provides education about the reality of living with a mental health condition—while it can make life more difficult, it doesn\'t have to stop someone from having a fulfilling life.',
                'url' => 'https://www.brownhealth.org/be-well/importance-mental-health-awareness-month/',
            ],
            // Add more articles...
        ];

        // Pass resources, articles, and notifications to the view
        return view('student.online-resources', compact('resources', 'articles', 'notifications'));
    }
}
