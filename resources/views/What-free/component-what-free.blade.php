<style>
    .max-2-line-title {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        height: 50px;
    }

    .max-3-line-content {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        height: 70px;
    }
</style>

<div class="col-12 col-sm-6 col-md-4 mb-30">
    <div class="border-16px color-Grey-Dark">
        <a href="{{route('what.free.detail', $coupon->id)}}">
            <div class="w-100">
                <img class="w-100"
                     style="max-height: 300px; object-fit: cover; height: 300px"
                     src="{{asset($coupon->thumbnail)}}">
            </div>
            @php
                $daysRemaining = \Carbon\Carbon::now()->diffInDays($coupon->end_evaluate);
            @endphp

            <div class="d-flex align-items-center  mt-3">
                @foreach(['tiktok', 'facebook', 'instagram', 'youtube', 'google'] as $platform)
                    @if($coupon->{"is_$platform"} == 1)
                        <div class="mr-1">
                            <i class="fab fa-{{ $platform }}"></i>
                        </div>
                    @endif
                @endforeach
                <i class="d-flex align-items-center">
                    <p class="header-center ml-2">
                        Còn {{ $daysRemaining }} ngày
                    </p>
                </i>
            </div>

            <div class="mt-3 flea-content-product max-2-line-title">{{ $coupon->title }}
            </div>
            <div
                class="text-gray mt-2 text-short-description max-3-line-content">{!! $coupon->short_description !!}
            </div>
        </a>
        <div class="justify-content-between d-flex mt-2">
            <i class="fa-solid fa-user-group d-flex align-items-center">
                <p
                    class="flea-content-product ml-2 fs-12">{{ $coupon->registered }}
                    /{{ $coupon->max_register }}
                </p>
            </i>
            <i>
                <div style="display: none" class="{{ \App\Http\Controllers\CouponController::isWithinTimeRange($coupon->startDate, $coupon->endDate) ? 'd-block' : '' }}">Thời gian ứng tuyển</div>
                <div style="display: none" class="{{ \App\Http\Controllers\CouponController::isWithinTimeRange($coupon->start_selective, $coupon->end_selective) ? 'd-block' : '' }}">Thời gian chọn lọc</div>
                <div style="display: none" class="{{ \App\Http\Controllers\CouponController::isWithinTimeRange($coupon->start_post, $coupon->end_post) ? 'd-block' : '' }}">Thời gian đăng bài</div>
                <div style="display: none" class="{{ \App\Http\Controllers\CouponController::isWithinTimeRange($coupon->start_evaluate, $coupon->end_evaluate) ? 'd-block' : '' }}">Thời gian đánh giá</div>
            </i>
        </div>
    </div>
</div>
