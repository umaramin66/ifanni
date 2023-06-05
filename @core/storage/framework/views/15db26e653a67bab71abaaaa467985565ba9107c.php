<?php $__env->startSection('site-title'); ?>
    <?php echo e(__('Edit Child Category')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('style'); ?>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.media.css','data' => []]); ?>
<?php $component->withName('media.css'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-lg-12">
                <div class="margin-top-40"></div>
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.msg.success','data' => []]); ?>
<?php $component->withName('msg.success'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.msg.error','data' => []]); ?>
<?php $component->withName('msg.error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            </div>
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="header-wrap d-flex justify-content-between">
                            <div class="left-content">
                                <h4 class="header-title"><?php echo e(__('Edit Child Category')); ?>   </h4>
                            </div>
                            <div class="right-content">
                                <a class="btn btn-info btn-sm" href="<?php echo e(route('admin.child.category')); ?>"><?php echo e(__('All Child Categories')); ?></a>
                            </div>
                        </div>
                        <form action="<?php echo e(route('admin.child.category.edit',$child_category->id)); ?>" method="post" enctype="multipart/form-data" id="edit_category_form">
                            <?php echo csrf_field(); ?>
                            <div class="tab-content margin-top-40">
                                <div class="form-group">
                                    <label for="icon" class="d-block"><?php echo e(__('Parent Category')); ?></label>
                                    <select name="category_id" id="category" class="form-control">
                                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($cat->id); ?>" <?php if($cat->id==$child_category->category_id): ?> selected <?php endif; ?>><?php echo e($cat->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="icon" class="d-block"><?php echo e(__('Sub Category')); ?></label>
                                    <select  name="sub_category_id" id="subcategory" class="form-control subcategory">
                                        <option <?php if(!empty($child_category->sub_category_id)): ?> value="<?php echo e($child_category->sub_category_id); ?>" <?php else: ?> value="" <?php endif; ?> >
                                            <?php echo e(optional($child_category->subcategory)->name); ?></option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="name"><?php echo e(__('Child Category Name')); ?></label>
                                    <input type="text" class="form-control" name="name" id="name" value="<?php echo e($child_category->name); ?>" placeholder="<?php echo e(__('Child Category Name')); ?>">
                                </div>
                                <div class="form-group permalink_label">
                                    <label class="text-dark"><?php echo e(__('Permalink * : ')); ?>

                                        <span id="slug_show" class="display-inline"></span>
                                        <span id="slug_edit" class="display-inline">
                                             <button class="btn btn-warning btn-sm slug_edit_button"> <i class="fas fa-edit"></i> </button>
                                            <input type="text" name="slug" class="form-control child_category_slug mt-2" value="<?php echo e($child_category->slug); ?>" style="display: none">
                                            <button class="btn btn-info btn-sm slug_update_button mt-2" style="display: none"><?php echo e(__('Update')); ?></button>
                                        </span>
                                    </label>
                                </div>

                                <!-- meta section start -->
                                <div class="row mt-4">
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="image"><?php echo e(__('Upload Child Category Image')); ?></label>
                                            <div class="media-upload-btn-wrapper">
                                                <div class="img-wrap">
                                                    <?php echo render_image_markup_by_attachment_id($child_category->image,'','thumb'); ?>

                                                </div>
                                                <input type="hidden" name="image" value="<?php echo e($child_category->image); ?>">
                                                <button type="button" class="btn btn-info media_upload_form_btn"
                                                        data-btntitle="<?php echo e(__('Select Image')); ?>"
                                                        data-modaltitle="<?php echo e(__('Upload Image')); ?>" data-toggle="modal"
                                                        data-target="#media_upload_modal">
                                                    <?php echo e(__('Upload Image')); ?>

                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-9">
                                        <div class="card">
                                            <div class="card-body meta">
                                                <h5 class="header-title"><?php echo e(__('Meta Section')); ?></h5>
                                                <div class="row">
                                                    <div class="col-xl-4 col-lg-3">
                                                        <div class="nav flex-column nav-pills" id="v-pills-tab"
                                                             role="tablist" aria-orientation="vertical">
                                                            <a class="nav-link active" id="v-pills-home-tab"
                                                               data-toggle="pill" href="#v-pills-home" role="tab"
                                                               aria-controls="v-pills-home"
                                                               aria-selected="true"><?php echo e(__('Child Category Meta')); ?></a>
                                                            <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill"
                                                               href="#v-pills-profile" role="tab"
                                                               aria-controls="v-pills-profile"
                                                               aria-selected="false"><?php echo e(__('Facebook Meta')); ?></a>
                                                            <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill"
                                                               href="#v-pills-messages" role="tab"
                                                               aria-controls="v-pills-messages"
                                                               aria-selected="false"><?php echo e(__('Twitter Meta')); ?></a>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-8 col-lg-9">
                                                        <div class="tab-content meta-content" id="v-pills-tabContent">

                                                            <!--child category meta section start -->
                                                            <div class="tab-pane fade show active" id="v-pills-home"
                                                                 role="tabpanel" aria-labelledby="v-pills-home-tab">
                                                                <div class="form-group">
                                                                    <label for="title"><?php echo e(__('Meta Title')); ?></label>
                                                                    <input type="text" class="form-control" name="meta_title" value="<?php echo e($child_category->metaData->meta_title ?? ''); ?>" placeholder="<?php echo e(__('Title')); ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="slug"><?php echo e(__('Meta Tags')); ?></label>
                                                                    <input type="text" class="form-control" name="meta_tags" value="<?php echo e($child_category->metaData->meta_tags ?? ''); ?>"
                                                                           placeholder="<?php echo e(__('Slug')); ?>" data-role="tagsinput">
                                                                </div>
                                                                <div class="row">
                                                                    <div class="form-group col-md-12">
                                                                        <label for="title"><?php echo e(__('Meta Description')); ?></label>
                                                                        <textarea name="meta_description" class="form-control max-height-140 meta-desc"
                                                                                  cols="20"
                                                                                  rows="4">
                                                                            <?php echo $child_category->metaData->meta_description ?? ''; ?>

                                                                        </textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--child category meta section end -->


                                                            <div class="tab-pane fade " id="v-pills-profile" role="tabpanel"
                                                                 aria-labelledby="v-pills-profile-tab">
                                                                <div class="form-group">
                                                                    <label for="title"><?php echo e(__('Facebook Meta Title')); ?></label>
                                                                    <input type="text" class="form-control" data-role="tagsinput"
                                                                           name="facebook_meta_tags" value="<?php echo e($child_category->metaData->facebook_meta_tags ?? ''); ?>">
                                                                </div>
                                                                <div class="row">
                                                                    <div class="form-group col-md-12">
                                                                        <label for="title"><?php echo e(__('Facebook Meta Description')); ?></label>
                                                                        <textarea name="facebook_meta_description"
                                                                                  class="form-control max-height-140 meta-desc"
                                                                                  cols="20"
                                                                                  rows="4"><?php echo $child_category->metaData->facebook_meta_description ?? ''; ?></textarea>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group ">
                                                                    <label for="og_meta_image"><?php echo e(__('Facebook Meta Image')); ?></label>
                                                                    <div class="media-upload-btn-wrapper">
                                                                        <div class="img-wrap">
                                                                            <?php echo render_attachment_preview_for_admin($child_category->metaData->facebook_meta_image ?? ''); ?>

                                                                        </div>
                                                                        <input type="hidden" id="facebook_meta_image" name="facebook_meta_image"
                                                                               value="<?php echo e($child_category->metaData->facebook_meta_image ?? ''); ?>">
                                                                        <button type="button" class="btn btn-info media_upload_form_btn"
                                                                                data-btntitle="<?php echo e(__('Select Image')); ?>"
                                                                                data-modaltitle="<?php echo e(__('Upload Image')); ?>" data-toggle="modal"
                                                                                data-target="#media_upload_modal">
                                                                            <?php echo e(__('Change Image')); ?>

                                                                        </button>
                                                                    </div>
                                                                    <small class="form-text text-muted"><?php echo e(__('allowed image format: jpg,jpeg,png')); ?></small>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane fade" id="v-pills-messages" role="tabpanel"
                                                                 aria-labelledby="v-pills-messages-tab">
                                                                <div class="form-group">
                                                                    <label for="title"><?php echo e(__('Twitter Meta Tag')); ?></label>
                                                                    <input type="text" class="form-control" data-role="tagsinput"
                                                                           name="twitter_meta_tags" value=" <?php echo e($child_category->metaData->twitter_meta_tags ?? ''); ?>">
                                                                </div>

                                                                <div class="row">
                                                                    <div class="form-group col-md-12">
                                                                        <label for="title"><?php echo e(__('Twitter Meta Description')); ?></label>
                                                                        <textarea name="twitter_meta_description"
                                                                                  class="form-control max-height-140 meta-desc"
                                                                                  cols="20"
                                                                                  rows="4"><?php echo $child_category->metaData->twitter_meta_description ?? ''; ?></textarea>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="og_meta_image"><?php echo e(__('Twitter Meta Image')); ?></label>
                                                                    <div class="media-upload-btn-wrapper">
                                                                        <div class="img-wrap">
                                                                            <?php echo render_attachment_preview_for_admin($child_category->metaData->twitter_meta_image ?? ''); ?>

                                                                        </div>
                                                                        <input type="hidden" id="twitter_meta_image" name="twitter_meta_image"
                                                                               value="<?php echo e($child_category->metaData->twitter_meta_image ?? ''); ?>">
                                                                        <button type="button" class="btn btn-info media_upload_form_btn"
                                                                                data-btntitle="<?php echo e(__('Select Image')); ?>"
                                                                                data-modaltitle="<?php echo e(__('Upload Image')); ?>" data-toggle="modal"
                                                                                data-target="#media_upload_modal">
                                                                            <?php echo e(__('Change Image')); ?>

                                                                        </button>
                                                                    </div>
                                                                    <small class="form-text text-muted"><?php echo e(__('allowed image format: jpg,jpeg,png')); ?></small>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- meta section end -->

                                <button type="submit" class="btn btn-primary mt-3 submit_btn"><?php echo e(__('Submit ')); ?></button>

                              </div>
                        </form>
                   </div>
                </div>
            </div>
        </div>
    </div>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.media.markup','data' => []]); ?>
<?php $component->withName('media.markup'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon-picker','data' => []]); ?>
<?php $component->withName('icon-picker'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?> 
</script> 
<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.media.js','data' => []]); ?>
<?php $component->withName('media.js'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

<script>
    (function ($) {
        "use strict";

        $(document).ready(function () {
            //Permalink Code
                var sl =  $('.child_category_slug').val();
                var url = `<?php echo e(url('/child-category/')); ?>/` + sl;
                var data = $('#slug_show').text(url).css('color', 'blue');

                function converToSlug(slug){
                   let finalSlug = slug.replace(/[^a-zA-Z0-9]/g, ' ');
                    //remove multiple space to single
                    finalSlug = slug.replace(/  +/g, ' ');
                    // remove all white spaces single or multiple spaces
                    finalSlug = slug.replace(/\s/g, '-').toLowerCase().replace(/[^\w-]+/g, '-');
                    return finalSlug;
                }

                //Slug Edit Code
                $(document).on('click', '.slug_edit_button', function (e) {
                    e.preventDefault();
                    $('.child_category_slug').show();
                    $(this).hide();
                    $('.slug_update_button').show();
                });

                //Slug Update Code
                $(document).on('click', '.slug_update_button', function (e) {
                    e.preventDefault();
                    $(this).hide();
                    $('.slug_edit_button').show();
                    var update_input = $('.child_category_slug').val();
                    var slug = converToSlug(update_input);
                    var url = `<?php echo e(url('/child-category/')); ?>/` + slug;
                    $('#slug_show').text(url);
                    $('.child_category_slug').val(slug)
                    $('.child_category_slug').hide();
                });

            $('#category').on('change',function(){
                let category_id = $(this).val();
                $.ajax({
                    method:'post',
                    url:"<?php echo e(route('admin.get.subcategory')); ?>",
                    data:{category_id:category_id},
                    success:function(res){
                        if(res.status=='success'){
                            let alloptions = '';
                            let allSubCategory = res.sub_categories;
                            $.each(allSubCategory,function(index,value){
                                alloptions +="<option value='" + value.id + "'>" + value.name + "</option>";
                            });
                            $(".subcategory").html(alloptions);
                            $('#subcategory').niceSelect('update');
                        }
                    }
                })
            })

        });
    })(jQuery)
</script>
<?php $__env->stopSection(); ?> 



<?php echo $__env->make('backend.admin-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bytesed/public_html/laravel/qixer/@core/resources/views/backend/pages/child-category/edit_child_category.blade.php ENDPATH**/ ?>