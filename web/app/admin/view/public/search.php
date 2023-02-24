<?php

$inputs = $searchArr['inputs'];
$btnArr = $searchArr['btnArr'] ?? [];
?>
<div class="row tuchu">
        <div class="col-md-10 ">
            <form class="row g-3" method="{$searchArr['method']}"
                  action="{$searchArr['action']}">
                <?php foreach ($inputs as $inputInfo) { ?>
                    <div class="col-auto">
                        <?php
                        //下拉框处理
                        if ($inputInfo['type'] == 'select') { ?>
                            <select class="form-select" name="{$inputInfo['name']}">
                                <option value="<?php echo $inputInfo['frist_option_value'] ?? '' ?>" <?php echo empty($inputInfo['options']) ? 'selected' : '' ?>>
                                    {$inputInfo['frist_option']}
                                </option>
                                <?php foreach (array_filter($inputInfo['options']) as $key => $value) {
                                    if (array_is_map($inputInfo['options'])) { ?>
                                        <option value="{$key}" <?php echo (($_GET[$inputInfo['name']] ?? '') == $key) ? 'selected' : '' ?>>{$value}</option>
                                    <?php } else { ?>
                                        <option value="{$value}" <?php echo (($_GET[$inputInfo['name']] ?? '') == $value) ? 'selected' : '' ?>>{$value}</option>
                                    <?php }
                                } ?>
                            </select>
                            <?php
                            //普通input处理
                        } elseif ($inputInfo['type'] == 'text') { ?>
                            <div class="col-auto">
                                <input type="{$inputInfo['type']}" class="form-control" name="{$inputInfo['name']}"
                                       value="<?php echo $inputInfo['value'] ?? strip_tags($_GET['search'] ?? '') ?>"
                                       placeholder="{$inputInfo['placeholder']}">
                            </div>
                        <?php } ?>
                    </div>
                <?php } ?>
                <?php if (!empty($inputs)) { ?>
                    <div class="col-auto">
                        <input type="submit" class="btn btn-outline-primary" value="搜索">
                    </div>
                <?php } ?>
            </form>
        </div>
        <div class="col-md-2">

            <?php foreach ($btnArr as $value) { ?>
                <a <?php foreach ($value['ext'] ?? [] as $key => $val) {
                    echo "$key='$val'";
                } ?> >
                    {$value['text']}
                </a>

            <?php } ?>
        </div>

</div>
