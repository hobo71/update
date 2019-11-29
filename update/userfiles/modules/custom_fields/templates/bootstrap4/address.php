<?php
// var_dump($data);var_dump($settings);die();
?>
<div class="col-<?php echo $settings['field_size']; ?>">
    <div class="mw-ui-field-holder">

        <?php if($settings['show_label']): ?>
        <label class="col-form-label">
            <?php echo $data['name']; ?>
            <?php if ($settings['required']): ?>
                <span style="color: red;">*</span>
            <?php endif; ?>
        </label>
        <?php endif; ?>

        <div class="mw-ui-controls">

            <?php foreach ($data['values'] as $key => $value): ?>

                <div class="mw-ui-field-holder control-group">

                    <?php if($settings['show_label']): ?>
                    <label class="mw-ui-label mw-ui-label-address-custom-field"><?php _e($value); ?>
                        <?php if ($settings['required']): ?>
                            <span style="color:red;">*</span>
                        <?php endif; ?>
                    </label>
                    <?php endif; ?>

                    <?php if ($key == 'country')  : ?>
                        <?php if ($data['countries']) { ?>

                            <select name="<?php echo $data['name'] ?>[country]" class="form-control">
                                <option value=""><?php _e('Choose country') ?></option>
                                <?php foreach ($data['countries'] as $country): ?>
                                    <option value="<?php echo $country ?>"><?php echo $country ?></option>
                                <?php endforeach; ?>
                            </select>
                        <?php } else { ?>
                            <input type="text" class="form-control" name="<?php echo $data['name'] ?>[<?php echo($key); ?>]" <?php if ($settings['required']) { ?> required <?php } ?> data-custom-field-id="<?php echo $data["id"]; ?>"/>
                        <?php } ?>

                    <?php else: ?>
                        <input type="text" class="form-control" name="<?php echo $data['name'] ?>[<?php echo($key); ?>]" <?php if ($settings['required']) { ?> required <?php } ?>
                               data-custom-field-id="<?php echo $data["id"]; ?>"/>
                    <?php endif; ?>

                </div>

            <?php endforeach; ?>
        </div>

        <?php if ($data['help']): ?>
            <small class="form-text text-muted"><?php echo $data['help']; ?></small>
        <?php endif; ?>
    </div>
</div>