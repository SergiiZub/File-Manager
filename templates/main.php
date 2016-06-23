<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="./templates/main.css" rel="stylesheet">
    <title>File Manager</title>
</head>
<body>
<div class="wrap">
    <div class="file_manager">
        <div class="current_dir">
            <span>
                <img src="./img/icons/folder.png" height="70px">
                <h2><?=basename(getcwd());?></h2>
            </span>
        
            <h4><?=getcwd();?></h4>
        </div>
        <div class="nav_button">
        <a href="<?='?go_to=' . $up_button['path'];?>"><img src="./img/icons/arrow_up.png" height="30px" alt="Up"></a>
        <a href="<?='?go_to=' . $reload_button['path'];?>"><img src="./img/icons/reload.png" height="30px" alt="Up"></a>
        </div>
        <div class="table">
        <table>
        <!--    folders display-->
            <thead>
                <tr>
                    <td style="width: 400px">Name</td>
                    <td>size</td>
                </tr>
                <tr>
                    <td>
        
                    </td>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($dir->getDirList() as $k => $value):?>
                <?php if($k != '..' && $k != '.'):?>
                <tr>
                    <td>
                        <a href="<?='?go_to=' . $value['path']?>">
                            <img src="./img/icons/folder.png" height="20px"><?=$k?>
                        </a>
                    </td>
                </tr>
                    <?php endif;?>
            <?php endforeach ?>
        
        <!--    files display-->
        
            <?php foreach ($dir->getFileList() as $k => $value):?>
                <tr>
                    <td>
                        <a href="<?='?go_to=' . $path . '&open=' . $value['name'];?>">
                            <img src="./img/icons/file.png" height="20px"><?=$k?>
                        </a>
                    </td>
                    <td><?=$value['size']?></td>
                </tr>
            <?php endforeach ?>
            </tbody>
        </table>
        </div>
    </div>
<?php if ($file_read != null):?>
<div class="open_file">
    <textarea title="<?=$open;?>" style="height: 500px; width: 700px">
            <?php foreach ($file_read->readFile() as $content):?>
            <?=$content;?>
            <?php endforeach;?>
    </textarea>
</div>
<?php endif;?>
</div>
</body>
</html>