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
            4 => ['x' => 118, 'y' => 250],
            5 => ['x' => 150, 'y' => 250],
            6 => ['x' => 115, 'y' => 278],
            7 => ['x' => 150, 'y' => 280],
            8 => ['x' => 113, 'y' => 310],
            9 => ['x' => 145, 'y' => 310],
            10 => ['x' => 110, 'y' => 340],
            11 => ['x' => 140, 'y' => 340],
            12 => ['x' => 105, 'y' => 370],
            13 => ['x' => 140, 'y' => 370],
            14 => ['x' => 100, 'y' => 400],
            15 => ['x' => 135, 'y' => 405],
            16 => ['x' => 98, 'y' => 440],
            17 => ['x' => 130, 'y' => 443],
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
            53 => ['x' => 333, 'y' => 465],
            54 => ['x' => 433, 'y' => 250],
            55 => ['x' => 473, 'y' => 252],
            56 => ['x' => 433, 'y' => 285],
            57 => ['x' => 473, 'y' => 292],
            58 => ['x' => 472, 'y' => 319],
            59 => ['x' => 432, 'y' => 318],
            60 => ['x' => 430, 'y' => 348],
            61 => ['x' => 470, 'y' => 350],
            62 => ['x' => 430, 'y' => 380],
            63 => ['x' => 460, 'y' => 385],
            64 => ['x' => 423, 'y' => 410],
            65 => ['x' => 460, 'y' => 410],
            66 => ['x' => 420, 'y' => 443],
            67 => ['x' => 455, 'y' => 442],
            68 => ['x' => 412, 'y' => 475],
            69 => ['x' => 450, 'y' => 477],
            70 => ['x' => 534, 'y' => 260],
            71 => ['x' => 568, 'y' => 265],
            72 => ['x' => 534, 'y' => 300],
            73 => ['x' => 560, 'y' => 300],
            74 => ['x' => 534, 'y' => 330],
            75 => ['x' => 560, 'y' => 330],
            76 => ['x' => 530, 'y' => 360],
            77 => ['x' => 558, 'y' => 360],
            78 => ['x' => 525, 'y' => 390],
            79 => ['x' => 555, 'y' => 390],
            80 => ['x' => 522, 'y' => 425],
            81 => ['x' => 555, 'y' => 425],
            82 => ['x' => 519, 'y' => 454],
            83 => ['x' => 550, 'y' => 456],
            84 => ['x' => 515, 'y' => 490],
            85 => ['x' => 543, 'y' => 490],
            86 => ['x' => 630, 'y' => 325],
            87 => ['x' => 628, 'y' => 370],
            88 => ['x' => 620, 'y' => 403],
            89 => ['x' => 620, 'y' => 430],
            90 => ['x' => 620, 'y' => 460],
            91 => ['x' => 615, 'y' => 490],
            92 => ['x' => 610, 'y' => 520],
            93 => ['x' => 610, 'y' => 560],
            94 => ['x' => 604, 'y' => 610],
            95 => ['x' => 600, 'y' => 643],
            96 => ['x' => 596, 'y' => 675],
            97 => ['x' => 595, 'y' => 706],
            98 => ['x' => 590, 'y' => 736],
            99 => ['x' => 588, 'y' => 775],
            100 => ['x' => 520, 'y' => 765],
            101 => ['x' => 483, 'y' => 761],
            102 => ['x' => 453, 'y' => 759],
            103 => ['x' => 420, 'y' => 754],
            104 => ['x' => 390, 'y' => 750],
            105 => ['x' => 360, 'y' => 748],
            106 => ['x' => 330, 'y' => 745],
            107 => ['x' => 300, 'y' => 740],
            108 => ['x' => 255, 'y' => 735],
            109 => ['x' => 511, 'y' => 555],
            110 => ['x' => 540, 'y' => 560],
            111 => ['x' => 500, 'y' => 600],
            112 => ['x' => 538, 'y' => 600],
            113 => ['x' => 500, 'y' => 630],
            114 => ['x' => 530, 'y' => 634],
            115 => ['x' => 500, 'y' => 664],
            116 => ['x' => 530, 'y' => 666],
            117 => ['x' => 495, 'y' => 698],
            118 => ['x' => 530, 'y' => 698],
            119 => ['x' => 450, 'y' => 547],
            120 => ['x' => 415, 'y' => 545],
            121 => ['x' => 325, 'y' => 542],
            122 => ['x' => 295, 'y' => 537],
            123 => ['x' => 292, 'y' => 567],
            124 => ['x' => 285, 'y' => 630],
            125 => ['x' => 278, 'y' => 670],
            126 => ['x' => 310, 'y' => 673],
            127 => ['x' => 343, 'y' => 676],
            128 => ['x' => 375, 'y' => 680],
            129 => ['x' => 405, 'y' => 685],
            130 => ['x' => 435, 'y' => 690],
            131 => ['x' => 225, 'y' => 527],
            132 => ['x' => 225, 'y' => 555],
            133 => ['x' => 34, 'y' => 525],
            134 => ['x' => 36, 'y' => 488],
            135 => ['x' => 40, 'y' => 455],
            136 => ['x' => 43, 'y' => 423],
            137 => ['x' => 46, 'y' => 395],
            138 => ['x' => 49, 'y' => 365],
            139 => ['x' => 52, 'y' => 333],
            140 => ['x' => 56, 'y' => 302],
            141 => ['x' => 58, 'y' => 270],
            142 => ['x' => 62, 'y' => 240],
            143 => ['x' => 64, 'y' => 213],
            144 => ['x' => 66, 'y' => 180],
            145 => ['x' => 303, 'y' => 90],
            146 => ['x' => 510, 'y' => 130],
            147 => ['x' => 675, 'y' => 150],
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
                    'floorPlans' => $lot->floor_plan->pluck('floor_plan')->map(fn($fp) => asset('storage/floorplan/' . basename($fp)))->toArray(),
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
