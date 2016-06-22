<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>File Manager</title>
</head>
<body>
<div>
    <span>
        <img src="icons/folder.png" height="70px">
        <h2><?=basename(getcwd());?></h2>
    </span>

    <h4><?=getcwd();?></h4>
</div>
<a href="<?='?go_to=' . $up_button['path'];?>"><img src="icons/arrow_up.png" height="30px" alt="Up"></a>
<a href="<?='?go_to=' . $reload_button['path'];?>"><img src="icons/reload.png" height="30px" alt="Up"></a>


<table>
<!--    folders display-->
    <thead>
        <tr>
            <td>Name</td>
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
                    <img src="icons/folder.png" height="20px"><?=$k?>
                </a>
            </td>
        </tr>
            <?php endif;?>
    <?php endforeach ?>

<!--    files display-->

    <?php foreach ($dir->getFileList() as $k => $value):?>
        <tr>
            <td>
                <a href="<?='?go_to=' . $value['path']?>">
                    <img src="icons/file.png" height="20px"><?=$k?>
                </a>
            </td>
            <td><?=$value['size']?></td>
        </tr>
    <?php endforeach ?>
    </tbody>
</table>
</body>
</html>