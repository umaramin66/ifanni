<?php $__env->startSection('page-meta-data'); ?>
    <title> <?php echo e($buyer->name); ?></title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('style'); ?>
    <style>
        .profile-flex-content {
            flex-wrap: nowrap !important;
        }
        .seller-social-links {
            display: flex;
            align-items: center;
            gap: 7px;
            flex-wrap: wrap;
        }
        .seller-social-links a {
            font-size: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 25px;
            width: 25px;
            background-color: #fff;
            color: var(--main-color-one);
            border-radius: 50%;
            transition: all .3s;
        }
        .seller-social-links a:hover{
            background-color: var(--main-color-one);
            color: #fff;
        }
        .seller-verified{
            font-size: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 20px;
            width: 20px;
            background-color: var(--main-color-one);
            color: #fff;
            border-radius: 50%;
        }
        .profile-flex-content .profile-contents .title {
            display: flex;
            align-items: center;
            gap: 4px;
        }

        /* Tooltip container */
        .tooltip {
            position: relative;
            display: inline-block;
            border-bottom: 1px dotted black;
        }

        .tooltip .tooltiptext {
            visibility: hidden;
            width: 120px;
            background-color: black;
            color: #fff;
            text-align: center;
            padding: 5px 0;
            border-radius: 6px;
            position: absolute;
            z-index: 1;
        }
        .tooltip:hover .tooltiptext {
            visibility: visible;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <!-- Banner Inner area Starts -->
    <?php if(!empty($buyer)): ?>
        <div class="banner-inner-area section-bg-2 padding-top-40 padding-bottom-70">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 col-md-6 margin-top-30">
                        <div class="profile-author-contents">
                            <div class="profile-flex-content">
                                <div class="thumb">
                                    <?php echo render_image_markup_by_attachment_id($buyer->image); ?>

                                </div>
                                <div class="profile-contents">
                                    <h4 class="title">
                                        <a href="<?php echo e(route('about.buyer.profile',$buyer->username)); ?>"> <?php echo e($buyer->name); ?> </a>
                                        <?php if($buyer->email_verified == 1): ?>
                                            <div data-toggle="tooltip" data-placement="top" title="<?php echo e(__('This Buyer is verified')); ?>">
                                                <span class="seller-verified"> <i class="las la-check"></i> </span>
                                            </div>
                                        <?php endif; ?>
                                    </h4>
                                    <?php if($job_rating >=1): ?>
                                        <div class="profiles-review">
                                            <span class="reviews">
                                                <b><?php echo ratting_star(round($job_rating,1) ); ?> </b>
                                                (<?php echo e($job_reviews->count()); ?>)
                                            </span>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 margin-top-30">
                        <div class="profile-author-contents">
                            <ul class="profile-about">
                                <li> <?php echo e(__('From:')); ?> <span> <?php echo e(optional($buyer->country)->country); ?> </span> </li>
                                <li> <?php echo e(__('Buyer Since:')); ?> <span> <?php echo e(Carbon\Carbon::parse($buyer_since->created_at)->year); ?>  </span> </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-5 margin-top-30">
                        <div class="profile-author-contents">
                            <div class="profile-single-achieve">
                                <div class="single-achieve">
                                    <div class="achieve-inner">
                                        <div class="icon">
                                            <i class="las la-briefcase"></i>
                                        </div>
                                        <div class="contents margin-top-10">
                                            <h3 class="title"><?php if(!empty($total_job_posts)): ?><?php echo e($total_job_posts); ?> <?php endif; ?></h3>
                                            <span class="ratings-span"> <?php echo e(__('Total Posted Jobs')); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-achieve">
                                    <div class="achieve-inner">
                                        <div class="icon"><i class="las la-star"></i></div>
                                        <div class="contents margin-top-10">
                                            <h3 class="title"><?php if(!empty($buyer_rating_percentage_value)): ?> <?php echo e(ceil($buyer_rating_percentage_value)); ?>% <?php endif; ?></h3>
                                            <span class="ratings-span"><?php echo e(__('Buyer Rating')); ?> </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <!-- Job Post starts -->
    <?php if(!empty($jobs)): ?>
        <section class="services-area padding-top-100 padding-bottom-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title-two">
                            <h3 class="title"><?php echo e(__('Job of this Buyer')); ?> </h3>
                        </div>
                    </div>
                </div>
                <div class="row margin-top-50">
                    <div class="col-lg-12">
                        <div class="services-slider dot-style-one">
                            <?php $__empty_1 = true; $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <div class="single-services-item">
                                    <div class="single-service">
                                        <a href="<?php echo e(route('service.list.details',$job->slug)); ?>" class="service-thumb service-bg-thumb-format"  <?php echo render_background_image_markup_by_attachment_id($job->image); ?>>

                                            <?php
                                                  $title =  $job->title;
                                                  $slug =  $job->slug;
                                                  $route = route('job.post.details',$slug);

                                                    // offline and online job location show
                                                   $job_country =  optional($job->country)->country;
                                                   $job_city =  optional($job->city)->service_city;
                                                   if($job_country){
                                                        $job_location = $job_country .' , '. $job_city;
                                                    }else{
                                                        $job_location = __('Online');
                                                    }

                                                  $is_job_hired = optional($job->job_request)->where('is_hired',1)->count() ?? 0;
                                                  $hired = __('Already Hired');

                                                  if($is_job_hired >= 1){
                                                      $apply = '<a href="javascript:void(0)" class="btn btn-danger w-100" disabled>'.$hired.'</a>';
                                                  }elseif($job->dead_line >= date('Y-m-d h:i:s')){
                                                      $apply = '<a href="'.$route.'" class="cmn-btn btn-small btn-bg-1 w-100">'.__('Apply Now').' </a>';
                                                  }else {
                                                      $apply = __('Expired');
                                                  }
                                            ?>

                                            <?php if($job->featured == 1): ?>
                                                <div class="award-icons">
                                                    <i class="las la-award"></i>
                                                </div>
                                            <?php endif; ?>
                                            <div class="country_city_location">
                                                <span class="single_location"> <i class="las la-map-marker-alt"></i>
                                                    <?php echo e($job_location); ?>

                                                  </span>
                                            </div>
                                        </a>
                                        <div class="services-contents">
                                            <ul class="author-tag">
                                                <li class="tag-list">
                                                    <a href="<?php echo e(route('about.seller.profile',optional($job->buyer)->username)); ?>">
                                                        <div class="authors">
                                                            <a href="<?php echo e(route('about.buyer.profile',optional($job->buyer)->username)); ?>">
                                                            <div class="thumb">
                                                                <?php echo render_image_markup_by_attachment_id(optional($job->buyer)->image); ?>

                                                                <span class="notification-dot"></span>
                                                            </div>
                                                            </a>
                                                            <a href="<?php echo e(route('about.buyer.profile',optional($job->buyer)->username)); ?>">
                                                            <span class="author-title"><?php echo e(optional($job->buyer)->name); ?> </span>
                                                            </a>
                                                        </div>
                                                    </a>
                                                </li>
                                                    <?php if(!empty($job->reviews)): ?>
                                                        <li class="tag-list">
                                                            <a href="javascript:void(0)">
                                                            <span class="reviews">
                                                                <?php echo ratting_star(round(optional($job->reviews)->avg('rating'),1)); ?>

                                                                (<?php echo e(optional($job->reviews)->count()); ?>)
                                                            </span>
                                                            </a>
                                                        </li>
                                                    <?php endif; ?>
                                            </ul>

                                            <h5 class="common-title"> <a href="<?php echo e($route); ?>"><?php echo e($job->title); ?> </a> </h5>
                                            <p class="common-para"> <?php echo e(\Illuminate\Support\Str::limit(strip_tags($job->description),100)); ?> </p>
                                            <div class="service-price">
                                                <span class="starting"><?php echo e(__('Starting at')); ?> </span>
                                                <span class="prices"> <?php echo e(amount_with_currency_symbol( $job->price)); ?> </span>
                                            </div>
                                            <div class="btn-wrapper d-flex flex-wrap">
                                                <?php echo $apply; ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <h3 class="text-warning"><?php echo e(__('No Job Found')); ?></h3>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
    <!-- Job Post ends -->

    <!-- Review buyer area Starts -->
    <?php if($job_reviews-> count() >= 1): ?>
        <div class="review-seller-area padding-bottom-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title-two">
                            <h3 class="title"><?php echo e(__('Reviews as Buyer')); ?></h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="review-seller-wrapper">
                            <div class="about-review-tab">
                                <?php $__currentLoopData = $job_reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="about-seller-flex-content style-02">
                                        <div class="about-seller-thumb">
                                            <?php echo render_image_markup_by_attachment_id(optional($review->seller)->image); ?>

                                        </div>
                                        <div class="about-seller-content">
                                            <h5 class="title"> <?php echo e($review->name); ?> </h5>
                                            <div class="about-seller-list">
                                                <span class="icon">  <i class="las la-star"></i>  </span>
                                                <span class="icon">  <i class="las la-star"></i>  </span>
                                                <span class="icon">  <i class="las la-star"></i>  </span>
                                                <span class="icon">  <i class="las la-star"></i>  </span>
                                                <span class="icon">  <i class="las la-star"></i>  </span>
                                            </div>
                                            <p class="about-review-para"><?php echo e($review->message); ?></p>
                                            <span class="review-date"> <?php echo e(optional($review->created_at)->toFormattedDateString()); ?> </span>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                    <div class="blog-pagination margin-top-55">
                        <div class="custom-pagination mt-4 mt-lg-5">
                            <?php echo $job_reviews->links(); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <!-- Review buyer area ends -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bytesed/public_html/laravel/qixer/@core/resources/views/frontend/pages/buyer/profile.blade.php ENDPATH**/ ?>