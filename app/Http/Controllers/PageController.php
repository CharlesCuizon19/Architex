<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Lots;
use App\Models\Properties;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function homepage()
    {
        $blogs = [
            (object) [
                'id' => 1,
                'image' => 'img/blogs-img1.png',
                'category' => 'Materials',
                'date' => '2025-01-10',
                'title' => 'Steel Fabrication: Strength Behind Every Structure',
            ],
            (object) [
                'id' => 2,
                'image' => 'img/blogs-img2.png',
                'category' => 'Architect',
                'date' => '2025-01-10',
                'title' => 'Smart Spaces: The Future of Modern Living',
            ],
            (object) [
                'id' => 3,
                'image' => 'img/blogs-img3.png',
                'category' => 'Design',
                'date' => '2025-01-10',
                'title' => 'Designing Exteriors that Inspire Productivity',
            ],
        ];

        return view('frontend.homepage', compact('blogs'));
    }
    public function aboutUs()
    {
        return view('frontend.about-us');
    }
    public function properties()
    {
        // ✅ Fetch all properties with their related images
        $properties = Properties::with('images')->get()->map(function ($property) {
            return (object) [
                'id' => $property->id,
                'image' => $property->property_thumbnail
                    ? asset($property->property_thumbnail)
                    : ($property->images->first() ? asset($property->images->first()->image) : asset('img/default-property.jpg')),
                'title' => $property->name,
                'description' => $property->description ?? 'No description available.',
            ];
        });

        return view('frontend.properties', compact('properties'));
    }

    public function services()
    {
        return view('frontend.services');
    }
    public function blogs()
    {
        $blogs = Blog::with('category')
            ->orderBy('blog_date', 'desc')
            ->get();

        return view('frontend.blogs', compact('blogs'));
    }

    public function contactUs()
    {
        return view('frontend.contact-us');
    }
    public function blog_Details($id)
    {
        // Get the current blog with category
        $blog = Blog::with('category')->findOrFail($id);

        // Get recent 3 blogs excluding the current one
        $recentBlogs = Blog::with('category')
            ->where('id', '!=', $id)
            ->orderBy('blog_date', 'desc')
            ->take(3)
            ->get();

        // Get all blogs except current (for the “You Might Also Like” swiper)
        $blogs = Blog::with('category')
            ->where('id', '!=', $id)
            ->orderBy('blog_date', 'desc')
            ->get();

        return view('frontend.blog-single-page', compact('blog', 'recentBlogs', 'blogs'));
    }

    public function propertiesSinglePage($id)
    {
        $property = Properties::with(['images', 'blocks'])->findOrFail($id);

        // ✅ Define static positions for specific lot IDs
        $staticPositions = [
            1 => ['x' => 150, 'y' => 180],
            2 => ['x' => 120, 'y' => 220],
            3 => ['x' => 150, 'y' => 220],
            4 => ['x' => 120, 'y' => 250],
            5 => ['x' => 150, 'y' => 250],
            6 => ['x' => 110, 'y' => 280],
            7 => ['x' => 150, 'y' => 280],
            8 => ['x' => 110, 'y' => 310],
            9 => ['x' => 150, 'y' => 310],
            10 => ['x' => 110, 'y' => 340],
            11 => ['x' => 140, 'y' => 340],
            12 => ['x' => 100, 'y' => 370],
            13 => ['x' => 140, 'y' => 370],
            14 => ['x' => 100, 'y' => 400],
            15 => ['x' => 140, 'y' => 400],
            16 => ['x' => 100, 'y' => 440],
            17 => ['x' => 130, 'y' => 440],
            18 => ['x' => 220, 'y' => 170],
            19 => ['x' => 260, 'y' => 170],
            20 => ['x' => 220, 'y' => 205],
            21 => ['x' => 260, 'y' => 207],
            22 => ['x' => 220, 'y' => 240],
            23 => ['x' => 255, 'y' => 240],
            24 => ['x' => 215, 'y' => 270],
            25 => ['x' => 250, 'y' => 270],
            26 => ['x' => 215, 'y' => 300],
            27 => ['x' => 250, 'y' => 300],
            28 => ['x' => 210, 'y' => 330],
            29 => ['x' => 245, 'y' => 330],
            30 => ['x' => 210, 'y' => 360],
            31 => ['x' => 245, 'y' => 360],
            32 => ['x' => 205, 'y' => 390],
            33 => ['x' => 240, 'y' => 390],
            34 => ['x' => 200, 'y' => 420],
            35 => ['x' => 240, 'y' => 422],
            36 => ['x' => 197, 'y' => 452],
            37 => ['x' => 235, 'y' => 455],
            38 => ['x' => 320, 'y' => 240],
            39 => ['x' => 360, 'y' => 245],
            40 => ['x' => 320, 'y' => 280],
            41 => ['x' => 354, 'y' => 280],
            42 => ['x' => 320, 'y' => 305],
            43 => ['x' => 350, 'y' => 305],
            44 => ['x' => 310, 'y' => 335],
            45 => ['x' => 350, 'y' => 335],
            46 => ['x' => 310, 'y' => 365],
            47 => ['x' => 345, 'y' => 365],
            48 => ['x' => 305, 'y' => 400],
            49 => ['x' => 340, 'y' => 400],
            50 => ['x' => 305, 'y' => 430],
            51 => ['x' => 340, 'y' => 430],
            52 => ['x' => 302, 'y' => 465],
            53 => ['x' => 286, 'y' => 234],
            54 => ['x' => 667, 'y' => 768],
            55 => ['x' => 427, 'y' => 103],
            56 => ['x' => 763, 'y' => 898],
            57 => ['x' => 913, 'y' => 480],
            58 => ['x' => 1124, 'y' => 697],
            59 => ['x' => 290, 'y' => 360],
            60 => ['x' => 159, 'y' => 254],
            61 => ['x' => 498, 'y' => 858],
            62 => ['x' => 789, 'y' => 413],
            63 => ['x' => 886, 'y' => 765],
            64 => ['x' => 416, 'y' => 515],
            65 => ['x' => 272, 'y' => 254],
            66 => ['x' => 547, 'y' => 275],
            67 => ['x' => 836, 'y' => 230],
            68 => ['x' => 81, 'y' => 560],
            69 => ['x' => 856, 'y' => 239],
            70 => ['x' => 665, 'y' => 313],
            71 => ['x' => 957, 'y' => 108],
            72 => ['x' => 469, 'y' => 393],
            73 => ['x' => 945, 'y' => 131],
            74 => ['x' => 947, 'y' => 646],
            75 => ['x' => 218, 'y' => 526],
            76 => ['x' => 531, 'y' => 642],
            77 => ['x' => 289, 'y' => 735],
            78 => ['x' => 818, 'y' => 542],
            79 => ['x' => 874, 'y' => 312],
            80 => ['x' => 140, 'y' => 364],
            81 => ['x' => 928, 'y' => 826],
            82 => ['x' => 226, 'y' => 499],
            83 => ['x' => 468, 'y' => 625],
            84 => ['x' => 54, 'y' => 768],
            85 => ['x' => 1039, 'y' => 668],
            86 => ['x' => 1131, 'y' => 552],
            87 => ['x' => 265, 'y' => 867],
            88 => ['x' => 83, 'y' => 147],
            89 => ['x' => 270, 'y' => 842],
            90 => ['x' => 487, 'y' => 294],
            91 => ['x' => 793, 'y' => 751],
            92 => ['x' => 842, 'y' => 870],
            93 => ['x' => 940, 'y' => 264],
            94 => ['x' => 944, 'y' => 443],
            95 => ['x' => 750, 'y' => 121],
            96 => ['x' => 155, 'y' => 111],
            97 => ['x' => 664, 'y' => 564],
            98 => ['x' => 668, 'y' => 728],
            99 => ['x' => 220, 'y' => 849],
            100 => ['x' => 459, 'y' => 290],
            101 => ['x' => 254, 'y' => 390],
            102 => ['x' => 295, 'y' => 362],
            103 => ['x' => 674, 'y' => 667],
            104 => ['x' => 462, 'y' => 423],
            105 => ['x' => 803, 'y' => 553],
            106 => ['x' => 113, 'y' => 126],
            107 => ['x' => 1200, 'y' => 108],
            108 => ['x' => 187, 'y' => 168],
            109 => ['x' => 539, 'y' => 516],
            110 => ['x' => 77, 'y' => 560],
            111 => ['x' => 405, 'y' => 501],
            112 => ['x' => 159, 'y' => 563],
            113 => ['x' => 1081, 'y' => 862],
            114 => ['x' => 1027, 'y' => 767],
            115 => ['x' => 173, 'y' => 571],
            116 => ['x' => 670, 'y' => 535],
            117 => ['x' => 162, 'y' => 494],
            118 => ['x' => 783, 'y' => 615],
            119 => ['x' => 614, 'y' => 209],
            120 => ['x' => 1003, 'y' => 563],
            121 => ['x' => 583, 'y' => 143],
            122 => ['x' => 234, 'y' => 824],
            123 => ['x' => 482, 'y' => 232],
            124 => ['x' => 677, 'y' => 192],
            125 => ['x' => 964, 'y' => 436],
            126 => ['x' => 933, 'y' => 426],
            127 => ['x' => 449, 'y' => 261],
            128 => ['x' => 168, 'y' => 406],
            129 => ['x' => 1051, 'y' => 383],
            130 => ['x' => 947, 'y' => 597],
            131 => ['x' => 489, 'y' => 840],
            132 => ['x' => 660, 'y' => 837],
            133 => ['x' => 78, 'y' => 197],
            134 => ['x' => 587, 'y' => 154],
            135 => ['x' => 458, 'y' => 563],
            136 => ['x' => 500, 'y' => 664],
            137 => ['x' => 93, 'y' => 510],
            138 => ['x' => 1016, 'y' => 632],
            139 => ['x' => 442, 'y' => 217],
            140 => ['x' => 1187, 'y' => 329],
            141 => ['x' => 515, 'y' => 560],
            142 => ['x' => 122, 'y' => 465],
            143 => ['x' => 178, 'y' => 459],
            144 => ['x' => 189, 'y' => 388],
            145 => ['x' => 1020, 'y' => 209],
            146 => ['x' => 890, 'y' => 298],
            147 => ['x' => 151, 'y' => 879],
            148 => ['x' => 789, 'y' => 875],
            149 => ['x' => 1085, 'y' => 664],
            150 => ['x' => 278, 'y' => 336],
            151 => ['x' => 531, 'y' => 485],
            152 => ['x' => 294, 'y' => 384],
            153 => ['x' => 423, 'y' => 642],
            154 => ['x' => 1042, 'y' => 134],
            155 => ['x' => 586, 'y' => 389],
            156 => ['x' => 129, 'y' => 220],
            157 => ['x' => 1131, 'y' => 635],
            158 => ['x' => 101, 'y' => 257],
            159 => ['x' => 1177, 'y' => 172],
            160 => ['x' => 687, 'y' => 731],
        ];
        $lots = Lots::with(['block', 'category', 'type', 'images', 'floor_plan'])
            ->whereHas('block', fn($q) => $q->where('property_id', $id))
            ->get()
            ->map(function ($lot) use ($staticPositions) {
                $x = $staticPositions[$lot->id]['x'] ?? ($lot->x ?? 0);
                $y = $staticPositions[$lot->id]['y'] ?? ($lot->y ?? 0);

                return [
                    'id' => $lot->id,
                    'name' => $lot->lot_name ?? 'Unnamed Lot',
                    'size' => $lot->area ? $lot->area . ' sqm' : 'N/A',
                    'price' => $lot->price ? '₱' . number_format($lot->price, 2) : 'N/A',
                    'status' => $lot->status ? ucfirst($lot->status) : 'N/A',
                    'type' => $lot->type->type_name ?? 'N/A',
                    'category' => $lot->category->category_name ?? 'N/A',
                    'block' => $lot->block->block_number ?? 'N/A',
                    'description' => $lot->description ?? 'No description available.',
                    'position' => ['x' => $x, 'y' => $y],
                    'images' => $lot->images->pluck('image')->map(fn($img) => asset($img))->toArray(),
                    'floorPlans' => $lot->floor_plan->pluck('floor_plan')->map(fn($img) => asset($img))->toArray(),
                    'highlights' => $lot->highlights ?? '',
                ];
            });

        $allAmenities = [
            asset('img/park.png'),
            asset('img/pool.png'),
            asset('img/park.png'),
            asset('img/gym.png'),
        ];

        return view('frontend.properties-single-page', compact('property', 'lots', 'allAmenities'));
    }


    public function rentals()
    {
        return view('frontend.rentals');
    }
    public function rentalDetails($id)
    {
        $rentals = [
            (object) [
                'id' => 1,
                'title' => 'Awhag Area',
                'img' => 'img/properties/first.png',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
                'images' => [
                    'img/properties/first.png',
                    'img/rental-img1.png',
                    'img/rental-img2.png',
                    'img/rental-img3.png',
                    'img/rental-img4.png',
                ],
            ],
            (object) [
                'id' => 2,
                'title' => 'Sasa Area',
                'img' => 'img/properties/second.png',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
                'images' => [
                    'img/rental-img1.png',
                    'img/rental-img2.png',
                    'img/rental-img3.png',
                    'img/rental-img4.png',
                ],
            ],
        ];

        $rental = collect($rentals)->firstWhere('id', $id);

        return view('frontend.rental-details', compact('rental'));
    }
}
