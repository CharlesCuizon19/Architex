<?php

namespace App\Http\Controllers;

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

        $properties = [
            (object) [
                'id' => 1,
                'image' => 'img/properties/single-page.png',
                'title' => 'Apo Yama Residences',
            ],
        ];

        return view('frontend.properties', compact('properties'));
    }
    public function services()
    {
        return view('frontend.services');
    }
    public function blogs()
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
        return view('frontend.blogs', compact('blogs'));
    }
    public function contactUs()
    {
        return view('frontend.contact-us');
    }
    public function blog_Details($id)
    {
        $blogs = [
            (object) [
                'id' => 1,
                'image' => 'img/blogs-img1.png',
                'category' => 'Materials',
                'date' => '2025-01-12',
                'title' => 'Steel Fabrication: Strength Behind Every Structure',
                'context' => 'In recent years, technology has rapidly transformed every aspect of our lives—from how we communicate, to how we work, to how we spend our leisure time. One of the most significant changes has taken place in our homes and communities, where innovation is redefining the very concept of living. Smart spaces are at the heart of this transformation, offering a new era of comfort, convenience, sustainability, and security.',
            ],
            (object) [
                'id' => 2,
                'image' => 'img/blogs-img2.png',
                'category' => 'Architect',
                'date' => '2025-02-17',
                'title' => 'Smart Spaces: The Future of Modern Living',
                'context' => 'In recent years, technology has rapidly transformed every aspect of our lives—from how we communicate, to how we work, to how we spend our leisure time. One of the most significant changes has taken place in our homes and communities, where innovation is redefining the very concept of living. Smart spaces are at the heart of this transformation, offering a new era of comfort, convenience, sustainability, and security.',
            ],
            (object) [
                'id' => 3,
                'image' => 'img/blogs-img3.png',
                'category' => 'Design',
                'date' => '2025-05-12',
                'title' => 'Designing Exteriors that Inspire Productivity',
                'context' => 'In recent years, technology has rapidly transformed every aspect of our lives—from how we communicate, to how we work, to how we spend our leisure time. One of the most significant changes has taken place in our homes and communities, where innovation is redefining the very concept of living. Smart spaces are at the heart of this transformation, offering a new era of comfort, convenience, sustainability, and security.',
            ],
        ];

        $blog = collect($blogs)->firstWhere('id', $id);
        $recentBlogs = collect($blogs)->sortByDesc('date')->where('id', '!=', $id)->take(3);
        $blogs = collect($blogs)->sortByDesc('date')->where('id', '!=', $id);

        return view('frontend.blog-single-page', compact('blog', 'recentBlogs', 'blogs'));
    }

    public function propertiesSinglePage($id)
    {
        $properties = [
            [
                'id' => 1,
                'name' => 'Apo Yama Residences',
                'img' => 'img/properties/single-page.png',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
                'images' => [
                    'img/properties/first.png',
                    'img/rental-img1.png',
                    'img/rental-img2.png',
                    'img/rental-img3.png',
                    'img/rental-img4.png',
                ],
                // 'amenities' => [
                //     'img/amenities/pool.png',
                //     'img/amenities/gym.png',
                //     'img/amenities/playground.png',
                // ],
                'floor_plan' => [
                    'img/floorplan1.png',
                    'img/floorplan2.png',
                ],
                'house' => 'img/house-detail1.png',
                'house_details' => [
                    'img/house-detail1.png',
                    'img/house-detail2.png',
                    'img/house-detail3.png',
                    'img/house-detail4.png',
                    'img/house-detail5.png',
                ],
                'size' => '150 sqm',
                'price' => '₱2,800,000',
                'status' => 'Available',

            ],
            [
                'id' => 2,
                'name' => 'Sasa Area',
                'img' => 'img/properties/second.png',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
                'images' => [
                    'img/rental-img1.png',
                    'img/rental-img2.png',
                    'img/rental-img3.png',
                    'img/rental-img4.png',
                ],
                // 'amenities' => [
                //     'img/amenities/pool.png',
                //     'img/amenities/gym.png',
                //     'img/amenities/playground.png',
                // ],
                'floor_plan' => [
                    'img/floorplan1.png',
                    'img/floorplan2.png',
                ],
                'house' => 'img/house-detail1.png',
                'house_details' => [
                    'img/house-detail1.png',
                    'img/house-detail2.png',
                    'img/house-detail3.png',
                    'img/house-detail4.png',
                    'img/house-detail5.png',
                ],
                'size' => '130 sqm',
                'price' => '₱2,600,000',
                'status' => 'Reserved',
            ],
            [
                'id' => 3,
                'name' => 'Awhag Area',
                'img' => 'img/properties/third.png',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
                'images' => [
                    'img/rental-img1.png',
                    'img/rental-img2.png',
                    'img/rental-img3.png',
                    'img/rental-img4.png',
                ],
                // 'amenities' => [
                //     'img/amenities/pool.png',
                //     'img/amenities/gym.png',
                //     'img/amenities/playground.png',
                // ],
                'floor_plan' => [
                    'img/floorplan1.png',
                    'img/floorplan2.png',
                ],
                'house' => 'img/house-detail1.png',
                'house_details' => [
                    'img/house-detail1.png',
                    'img/house-detail2.png',
                    'img/house-detail3.png',
                    'img/house-detail4.png',
                    'img/house-detail5.png',
                ],
                'size' => '140 sqm',
                'price' => '₱2,700,000',
                'status' => 'Sold',
            ],
        ];

        $lots = [
             [
        'id' => 1,
        'name' => 'SANDERIANA',
        'size' => '150 sqm',
        'price' => '₱2,800,000',
        'status' => 'Available',
        'type' => 'Single Detached',
        'category' => 'Residential Lot',
        'address' => 'Block 3 Lot 1, Apo Yama Residences',
        'description' => 'Located near the main gate, this spacious lot offers convenience and accessibility with a beautiful garden view.',
        'highlights' => '4 Bedrooms including guest suite, carport for 2 vehicles',
        'images' => ['img/rental-img1.png','img/rental-img2.png','img/rental-img3.png'],
        'floor_plan' => ['img/floorplan1.png'],
        'house' => 'img/house-detail1.png',
        'house_details' => ['img/house-detail1.png','img/house-detail2.png','img/house-detail3.png'],
        'amenities' => ['img/pool.png','img/gym.png','img/park.png'],
        'position' => 'top: 23.5%; left: 15.5%;',
        'color' => 'bg-green-700',
    ],
    [
        'id' => 2,
        'name' => 'CAMELLIA',
        'size' => '140 sqm',
        'price' => '₱2,650,000',
        'status' => 'Reserved',
        'type' => 'Single Detached',
        'category' => 'Residential Lot',
        'address' => 'Block 3 Lot 2, Apo Yama Residences',
        'description' => 'This cozy lot is perfect for small families, located near the community playground and jogging path.',
        'highlights' => '3 Bedrooms, spacious living area, near amenities',
        'images' => ['img/rental-img4.png','img/rental-img5.png'],
        'floor_plan' => ['img/floorplan2.png'],
        'house' => 'img/house-detail2.png',
        'house_details' => ['img/house-detail3.png','img/house-detail4.png'],
        'amenities' => ['img/park.png','img/gym.png'],
        'position' => 'top: 28.7%; left: 12.2%;',
        'color' => 'bg-yellow-400',
    ],
    [
        'id' => 3,
        'name' => 'DAHLIA',
        'size' => '180 sqm',
        'price' => '₱3,100,000',
        'status' => 'Sold',
        'type' => 'Duplex',
        'category' => 'Residential Lot',
        'address' => 'Block 3 Lot 3, Apo Yama Residences',
        'description' => 'Corner lot with excellent sunlight exposure and proximity to the clubhouse. Ideal for growing families.',
        'highlights' => 'Modern duplex layout with 3 Bedrooms and rooftop terrace',
        'images' => ['img/rental-img6.png','img/rental-img7.png'],
        'floor_plan' => ['img/floorplan3.png'],
        'house' => 'img/house-detail3.png',
        'house_details' => ['img/house-detail2.png','img/house-detail5.png'],
        'amenities' => ['img/pool.png','img/gym.png'],
        'position' => 'top: 28.7%; left: 16.5%;',
        'color' => 'bg-red-400',
    ],
    [
        'id' => 4,
        'name' => 'ROSELLE',
        'size' => '160 sqm',
        'price' => '₱2,950,000',
        'status' => 'Sold',
        'type' => 'Bungalow',
        'category' => 'Residential Lot',
        'address' => 'Block 3 Lot 4, Apo Yama Residences',
        'description' => 'A quiet and shaded location with a wide frontage, great for retirees or minimalist home design.',
        'highlights' => 'Single-level design, wide yard space, near park',
        'images' => ['img/rental-img2.png','img/rental-img3.png'],
        'floor_plan' => ['img/floorplan2.png'],
        'house' => 'img/house-detail4.png',
        'house_details' => ['img/house-detail1.png','img/house-detail3.png'],
        'amenities' => ['img/park.png'],
        'position' => 'top: 32.7%; left: 12.2%;',
        'color' => 'bg-red-400',
    ],
    [
        'id' => 5,
        'name' => 'LAVENDER',
        'size' => '170 sqm',
        'price' => '₱3,000,000',
        'status' => 'Sold',
        'type' => 'Single Detached',
        'category' => 'Residential Lot',
        'address' => 'Block 3 Lot 5, Apo Yama Residences',
        'description' => 'A premium lot offering excellent mountain views and fresh breezes all year round.',
        'highlights' => '4 Bedrooms, open-concept living and dining, garden area',
        'images' => ['img/rental-img8.png','img/rental-img9.png'],
        'floor_plan' => ['img/floorplan1.png'],
        'house' => 'img/house-detail5.png',
        'house_details' => ['img/house-detail2.png','img/house-detail3.png'],
        'amenities' => ['img/pool.png','img/park.png'],
        'position' => 'top: 32.7%; left: 16.5%;',
        'color' => 'bg-red-400',
    ],
    [
        'id' => 6,
        'name' => 'ACACIA',
        'size' => '120 sqm',
        'price' => '₱2,400,000',
        'status' => 'Sold',
        'type' => 'Townhouse',
        'category' => 'Residential Lot',
        'address' => 'Block 3 Lot 6, Apo Yama Residences',
        'description' => 'Compact and efficient layout designed for young professionals or starting families.',
        'highlights' => '2 Bedrooms, balcony, low maintenance',
        'images' => ['img/rental-img10.png','img/rental-img11.png'],
        'floor_plan' => ['img/floorplan2.png'],
        'house' => 'img/house-detail1.png',
        'house_details' => ['img/house-detail4.png'],
        'amenities' => ['img/gym.png'],
        'position' => 'top: 36.7%; left: 12.2%;',
        'color' => 'bg-red-400',
    ],
    [
        'id' => 7,
        'name' => 'MAGNOLIA',
        'size' => '190 sqm',
        'price' => '₱3,250,000',
        'status' => 'Available',
        'type' => 'Single Detached',
        'category' => 'Residential Lot',
        'address' => 'Block 3 Lot 7, Apo Yama Residences',
        'description' => 'Spacious corner lot beside landscaped gardens, offering privacy and elegance.',
        'highlights' => '5 Bedrooms, 2-car garage, garden patio',
        'images' => ['img/rental-img12.png','img/rental-img13.png'],
        'floor_plan' => ['img/floorplan3.png'],
        'house' => 'img/house-detail3.png',
        'house_details' => ['img/house-detail5.png'],
        'amenities' => ['img/pool.png','img/park.png'],
        'position' => 'top: 36.7%; left: 16.5%;',
        'color' => 'bg-green-700',
    ],
    [
        'id' => 8,
        'name' => 'HIBISCUS',
        'size' => '155 sqm',
        'price' => '₱2,850,000',
        'status' => 'Reserved',
        'type' => 'Bungalow',
        'category' => 'Residential Lot',
        'address' => 'Block 3 Lot 8, Apo Yama Residences',
        'description' => 'A peaceful lot near the nature trail and picnic grove, ideal for weekend getaways.',
        'highlights' => 'Single-story layout, wide outdoor area',
        'images' => ['img/rental-img14.png'],
        'floor_plan' => ['img/floorplan1.png'],
        'house' => 'img/house-detail2.png',
        'house_details' => ['img/house-detail1.png','img/house-detail3.png'],
        'amenities' => ['img/park.png','img/gym.png'],
        'position' => 'top: 40.7%; left: 12.2%;',
        'color' => 'bg-yellow-400',
    ],
    [
        'id' => 9,
        'name' => 'IRIS',
        'size' => '175 sqm',
        'price' => '₱3,050,000',
        'status' => 'Sold',
        'type' => 'Single Detached',
        'category' => 'Residential Lot',
        'address' => 'Block 3 Lot 9, Apo Yama Residences',
        'description' => 'Modern family lot close to the clubhouse and swimming pool. Great for active lifestyles.',
        'highlights' => '4 Bedrooms, balcony, close to amenities',
        'images' => ['img/rental-img15.png'],
        'floor_plan' => ['img/floorplan2.png'],
        'house' => 'img/house-detail4.png',
        'house_details' => ['img/house-detail3.png'],
        'amenities' => ['img/pool.png','img/gym.png'],
        'position' => 'top: 40%; left: 16.5%;',
        'color' => 'bg-red-400',
    ],
            [
                'id' => 10,
                'name' => 'AZALEA',
                'type' => 'Single Detached',
                'address' => 'Block 3 Lot 10, Apo Yama Residences',
                'position' => 'top: 44%; left: 12.2%;',
                'color' => 'bg-red-400',
            ],
            [
                'id' => 11,
                'name' => 'CYPRESS',
                'type' => 'Single Detached',
                'address' => 'Block 3 Lot 11, Apo Yama Residences',
                'position' => 'top: 44%; left: 16.5%;',
                'color' => 'bg-red-400',
            ],
            [
                'id' => 12,
                'name' => 'ROSALEA',
                'type' => 'Single Detached',
                'address' => 'Block 3 Lot 12, Apo Yama Residences',
                'position' => 'top: 47.9%; left: 12.2%;',
                'color' => 'bg-red-400',
            ],
            [
                'id' => 13,
                'name' => 'MARANTA',
                'type' => 'Single Detached',
                'address' => 'Block 3 Lot 13, Apo Yama Residences',
                'position' => 'top: 47.9%; left: 16.5%;',
                'color' => 'bg-red-400',
            ],
            [
                'id' => 14,
                'name' => 'JASMINE',
                'type' => 'Single Detached',
                'address' => 'Block 3 Lot 14, Apo Yama Residences',
                'position' => 'top: 51.9%; left: 11.8%;',
                'color' => 'bg-red-400',
            ],
            [
                'id' => 15,
                'name' => 'NOVA',
                'type' => 'Single Detached',
                'address' => 'Block 3 Lot 15, Apo Yama Residences',
                'position' => 'top: 51.9%; left: 16.5%;',
                'color' => 'bg-red-400',
            ],
            [
                'id' => 16,
                'name' => 'MAREN',
                'type' => 'Single Detached',
                'address' => 'Block 3 Lot 16, Apo Yama Residences',
                'position' => 'top: 56.7%; left: 11.8%;',
                'color' => 'bg-red-400',
            ],
            [
                'id' => 17,
                'name' => 'AVENA',
                'type' => 'Single Detached',
                'address' => 'Block 3 Lot 17, Apo Yama Residences',
                'position' => 'top: 56.7%; left: 16.5%;',
                'color' => 'bg-red-400',
            ],

        ];

        $property = collect($properties)->firstWhere('id', $id);

        $allAmenities = collect($lots)
            ->pluck('amenities')
            ->flatten()
            ->unique()
            ->values()
            ->toArray();


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
