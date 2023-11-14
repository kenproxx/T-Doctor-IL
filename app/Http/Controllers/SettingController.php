<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function getAll()
    {
        $settings = Setting::all();

        return view('admin.general-config.tab-list-settings', compact('settings'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createView()
    {
        return view('admin.general-config.tab-create-setting');
    }
    public function create(Request $request)
    {
        try {
            $facebook = $request->input('facebook');
            $twitter = $request->input('twitter');
            $instagram = $request->input('instagram');
            $zalo = $request->input('zalo');
            $kakao = $request->input('kakao');

            $socialLinks = [
                'facebook' => $facebook,
                'twitter' => $twitter,
                'instagram' => $instagram,
                'zalo' => $zalo,
                'kakao' => $kakao,
            ];
            $listSocialLinks = implode(',', $socialLinks);
            if ($request->hasFile('logo')) {
                $logoPaths = array_map(function ($image) {
                    $itemPath = $image->store('logos', 'public');
                    return asset('storage/' . $itemPath);
                }, $request->file('logo'));
                $logo = implode(',', $logoPaths);
            } else {
                $logo = '';
            }

            if ($request->hasFile('ad_banner_position')) {
                $adBannerPaths = array_map(function ($image) {
                    $itemPath = $image->store('ad_banners', 'public');
                    return asset('storage/' . $itemPath);
                }, $request->file('ad_banner_position'));
                $ad_banner_position = implode(',', $adBannerPaths);
            } else {
                $ad_banner_position = '';
            }

            if ($request->hasFile('favicon')) {
                $faviconPaths = array_map(function ($image) {
                    $itemPath = $image->store('favicons', 'public');
                    return asset('storage/' . $itemPath);
                }, $request->file('favicon'));
                $favicon = implode(',', $faviconPaths);
            } else {
                $favicon = '';
            }

            $ad_banner_link = $request->file('ad_banner_link');
            $ad_banner_follow = $request->input('ad_banner_follow');
            $website_description_en = $request->input('website_description_en');
            $website_description_laos = $request->input('website_description_laos');
            $address = $request->input('address');
            $phone = $request->input('phone');
            $email = $request->input('email');
            $website_description = $request->input('website_description');


            $setting = new Setting();
            $setting->logo = $logo;
            $setting->ad_banner_position = $ad_banner_position;
            $setting->ad_banner_link = 1;
            $setting->ad_banner_follow = 1;
            $setting->address = $address;
            $setting->phone = $phone;
            $setting->email = $email;
            $setting->social_links = $listSocialLinks;
            $setting->website_description = $website_description;
            $setting->website_description_en = $website_description_en;
            $setting->website_description_laos = $website_description_laos;
            $setting->favicon = $favicon;
            $setting->save();

            if ($setting) {
                return view('admin.general-config.list-config', compact('setting'));
            }

            return response("Create error!", 400);
        } catch (\Exception $exception) {
            return response($exception->getMessage(), 400);
        }
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
