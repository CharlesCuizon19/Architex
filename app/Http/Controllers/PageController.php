<?php

namespace App\Http\Controllers;

use App\Models\Blog;
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
                'address' => 'Road Lot 3, Block 5 Lot 1, Apo Yama Residences',
                'description' => 'Block 4 Lot 1 is conveniently located near the main road with easy access 
                to community features. Perfect for families seeking a modern and secure neighborhood.',
                'highlights' => 'Total of 4 Bedrooms (including guest room)',
                'images' => [
                    'img/rental-img1.png',
                    'img/rental-img2.png',
                    'img/rental-img3.png',
                    'img/rental-img4.png',
                ],
                'house' => 'img/house-detail1.png',
                'house_details' => [
                    'img/house-detail1.png',
                    'img/house-detail2.png',
                    'img/house-detail3.png',
                    'img/house-detail4.png',
                    'img/house-detail5.png',
                ],
                'amenities' => [
                    'img/pool.png',
                    'img/gym.png',
                    'img/park.png',
                ],
                'color' => 'bg-green-700',
            ],
            [
                'id' => 2,
                'name' => 'Lorem',
                'size' => '130 sqm',
                'price' => '₱2,600,000',
                'status' => 'Reserved',
                'type' => 'Single Detached',
                'category' => 'Residential Lot',
                'address' => 'Road Lot 3, Block 5 Lot 2, Apo Yama Residences',
                'description' => 'Block 5 Lot 2 is conveniently located near the main road with easy access 
                to community features. Perfect for families seeking a modern and secure neighborhood.',
                'highlights' => 'Total of 3 Bedrooms',
                'images' => [
                    'img/rental-img1.png',
                    'img/rental-img2.png',
                    'img/rental-img3.png',
                    'img/rental-img4.png',
                ],
                'house' => 'img/house-detail1.png',
                'house_details' => [
                    'img/rental-img1.png',
                    'img/rental-img2.png',
                    'img/rental-img3.png',
                    'img/rental-img4.png',
                ],
                'amenities' => [
                    'img/pool.png',
                    'img/gym.png',
                    'img/park.png',
                ],
                'color' => 'bg-yellow-400',
            ],
            [
                'id' => 3,
                'name' => 'Ipsum',
                'size' => '140 sqm',
                'price' => '₱2,700,000',
                'status' => 'Sold',
                'type' => 'Single Detached',
                'category' => 'Residential Lot',
                'address' => 'Road Lot 3, Block 5 Lot 3, Apo Yama Residences',
                'description' => 'Block 6 Lot 3 is conveniently located near the main road with easy access 
                to community features. Perfect for families seeking a modern and secure neighborhood.',
                'highlights' => 'Total of 4 Bedrooms (including guest room)',
                'images' => [
                    'img/rental-img1.png',
                    'img/rental-img2.png',
                    'img/rental-img3.png',
                    'img/rental-img4.png',
                ],
                'house' => 'img/house-detail1.png',
                'house_details' => [
                    'img/house-detail1.png',
                    'img/house-detail2.png',
                    'img/house-detail3.png',
                    'img/house-detail4.png',
                    'img/house-detail5.png',
                ],
                'amenities' => [
                    'img/pool.png',
                    'img/gym.png',
                    'img/park.png',
                ],
                'color' => 'bg-red-700',
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
