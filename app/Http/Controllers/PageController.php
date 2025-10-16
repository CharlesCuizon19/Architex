<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function homepage()
    {
        return view('frontend.homepage');
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
        return view('frontend.blogs');
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
            (object) [
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
                'amenities' => [
                    'img/amenities/pool.png',
                    'img/amenities/gym.png',
                    'img/amenities/playground.png',
                ],
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
            (object) [
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
                'amenities' => [
                    'img/amenities/pool.png',
                    'img/amenities/gym.png',
                    'img/amenities/playground.png',
                ],
                'size' => '130 sqm',
                'price' => '₱2,600,000',
                'status' => 'Reserved',
            ],
        ];

        $property = collect($properties)->firstWhere('id', $id);

        return view('frontend.properties-single-page', compact('property'));
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
