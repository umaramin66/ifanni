
<?php $__env->startSection('site-title'); ?>
    <?php echo e(__('Jobs')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.frontend.seller-buyer-preloader','data' => []]); ?>
<?php $component->withName('frontend.seller-buyer-preloader'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

    <!-- Dashboard area Starts -->
    <div class="body-overlay"></div>
    <div class="dashboard-area dashboard-padding">
        <div class="container-fluid">
            <div class="dashboard-contents-wrapper">
                <div class="dashboard-icon">
                    <div class="sidebar-icon">
                        <i class="las la-bars"></i>
                    </div>
                </div>
                <?php echo $__env->make('frontend.user.buyer.partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div class="dashboard-right">

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="dashboard-settings margin-top-40">
                                <h2 class="dashboards-title"><?php echo e(__('All Jobs')); ?></h2>
                                <p class="text-info"><?php echo e(__('You can not delete any job if it has any order')); ?></p>
                                <p class="text-info"><?php echo e(__('Yor jobs only published if the admin change the status inactive to active')); ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="btn-wrapper margin-top-50 text-right">
                        <a href="<?php echo e(route('buyer.add.job')); ?>" class="cmn-btn btn-bg-1"> <?php echo e(__('Create Jobs' )); ?></a>
                    </div>
                    <?php if($jobs->count() > 0): ?>
                        <?php $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="dashboard-service-single-item border-1 margin-top-40">
                                <div class="rows dash-single-inner">
                                    <div class="dash-left-service">
                                        <div class="dashboard-services">
                                            <div class="dashboar-flex-services">
                                                <div class="thumb bg-image" <?php echo render_background_image_markup_by_attachment_id($data->image,'','thumb'); ?>>
                                                </div>
                                                <div class="thumb-contents">
                                                    <h4 class="title"> <a href="<?php echo e(route('buyer.edit.job',$data->id)); ?>"> <?php echo e($data->title); ?> </a> </h4>
                                                    <span class="service-review style-02"> <i class="las la-eye"></i> <?php echo e($data->view); ?> </span>
                                                    <?php if($data->status==1): ?>
                                                        <span class="service-review style-02">
                                                 <small> <?php echo e(__('Status:')); ?></small> <small class="text-danger"> <?php echo e(__('Active')); ?></small>
                                            </span>
                                                    <?php else: ?>
                                                        <span class="service-review style-02">
                                                <small> <?php echo e(__('Status:')); ?></small> <small class="text-danger"> <?php echo e(__('Inactive')); ?></small>
                                            </span>
                                                    <?php endif; ?>
                                                    <div class="service-bottom-flex margin-top-30">
                                                        <a href="javascript:void(0)">
                                                            <div class="dashboard-service-bottom-flex color-2">
                                                                <div class="icon">
                                                                    <?php echo e(optional($data->orders)->count()); ?>

                                                                </div>
                                                                <div class="content">
                                                                    <span class="queue"> <?php echo e(__('Request')); ?> </span>
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <div>
                                                            <?php
                                                                $is_job_hired = Modules\JobPost\Entities\JobRequest::where('job_post_id',$data->id)->where('is_hired',1)->count();
                                                            ?>
                                                            <?php if($is_job_hired >=1 ): ?>
                                                                <span class="btn btn-danger"><?php echo e(__('Hired')); ?></span>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="dash-righ-service">
                                        <div class="dashboard-switch-flex-content">
                                            <div class="dashboard-switch-single">
                                                <span class="dashboard-starting"> <?php echo e(__('Starting From:')); ?> </span>
                                                <h2 class="title-price color-3"> <?php echo e(amount_with_currency_symbol($data->price)); ?> </h2>
                                            </div>
                                            <div class="dashboard-switch-single">
                                                <span class="dashboard-starting"> <?php echo e(__('On/Off Job Post')); ?> </span>
                                                <?php if($data->is_job_on==1): ?>
                                                    <input class="custom-switch style-02 service_on_off_btn" id="switch2_<?php echo e($data->id); ?>" type="checkbox" data-id="<?php echo e($data->id); ?>" />
                                                    <label class="switch-label style-02" for="switch2_<?php echo e($data->id); ?>"></label>
                                                <?php else: ?>
                                                    <input class="custom-switch service_on_off_btn" id="switch1_<?php echo e($data->id); ?>" type="checkbox" data-id="<?php echo e($data->id); ?>" />
                                                    <label class="switch-label" for="switch1_<?php echo e($data->id); ?>"></label>
                                                <?php endif; ?>
                                            </div>
                                            <div class="dashboard-switch-single">
                                                <a href="<?php echo e(route('buyer.edit.job',$data->id)); ?>"> <span class="dash-icon color-1" data-toggle="tooltip" data-placement="top" title="<?php echo e(__('Edit Job Post')); ?>"> <i class="las la-pen"></i> </span> </a>
                                                <a href="<?php echo e(route('job.post.details',$data->slug)); ?>"> <span class="dash-icon color-1" data-toggle="tooltip" data-placement="top" title="<?php echo e(__('Show Job Post')); ?>"> <i class="las la-eye"></i> </span> </a>
                                                <?php if(optional($data->orders)->count() == 0): ?>
                                                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.seller-delete-popup','data' => ['url' => route('buyer.job.delete',$data->id)]]); ?>
<?php $component->withName('seller-delete-popup'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['url' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('buyer.job.delete',$data->id))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <div class="blog-pagination margin-top-55">
                            <div class="custom-pagination mt-4 mt-lg-5">
                                <?php echo $jobs->links(); ?>

                            </div>
                        </div>
                    <?php else: ?>
                        <h2 class="no_data_found"><?php echo e(__('No Jobs Created Yet')); ?></h2>
                    <?php endif; ?>

                </div>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(asset('assets/backend/js/sweetalert2.js')); ?>"></script>
    <script>
        (function($){
            "use strict";

            $(document).ready(function(){

                $(document).on('change','.service_on_off_btn',function(e){
                    e.preventDefault();
                    if($(this).is(':checked')){
                        let job_post_id = $(this).data('id');
                        $.ajax({
                            method:'post',
                            url:"<?php echo e(route('buyer.job.on.off')); ?>",
                            data:{job_post_id:job_post_id},
                            success:function(res){
                                if(res.status=='success'){
                                    toastr.options = {
                                        "closeButton": true,
                                        "debug": false,
                                        "newestOnTop": false,
                                        "progressBar": true,
                                        "preventDuplicates": true,
                                        "onclick": null,
                                        "showDuration": "100",
                                        "hideDuration": "1000",
                                        "timeOut": "5000",
                                        "extendedTimeOut": "1000",
                                        "showEasing": "swing",
                                        "hideEasing": "linear",
                                        "showMethod": "show",
                                        "hideMethod": "hide"
                                    };
                                    toastr.success('Service On/Off Change Success---');
                                }
                            }
                        });
                    }else{
                        let job_post_id = $(this).data('id');
                        $.ajax({
                            method:'post',
                            url:"<?php echo e(route('buyer.job.on.off')); ?>",
                            data:{job_post_id:job_post_id},
                            success:function(res){
                                if(res.status=='success'){
                                    toastr.options = {
                                        "closeButton": true,
                                        "debug": false,
                                        "newestOnTop": false,
                                        "progressBar": true,
                                        "preventDuplicates": true,
                                        "onclick": null,
                                        "showDuration": "100",
                                        "hideDuration": "1000",
                                        "timeOut": "5000",
                                        "extendedTimeOut": "1000",
                                        "showEasing": "swing",
                                        "hideEasing": "linear",
                                        "showMethod": "show",
                                        "hideMethod": "hide"
                                    };
                                    toastr.success('Service On/Off Change Success---');
                                }
                            }
                        });
                    }

                });


                $(document).on('click','.swal_delete_button',function(e){
                    e.preventDefault();
                    Swal.fire({
                        title: '<?php echo e(__("Are you sure?")); ?>',
                        text: '<?php echo e(__("You would not be able to revert this item!")); ?>',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $(this).next().find('.swal_form_submit_btn').trigger('click');
                        }
                    });
                });

            });

        })(jQuery);
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.user.buyer.buyer-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bytesed/public_html/laravel/qixer/@core/Modules/JobPost/Resources/views/frontend/buyer/all-jobs.blade.php ENDPATH**/ ?>