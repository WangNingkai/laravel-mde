# laravel-mde

## 现代、简洁、易用的Markdown编辑器

`laravel-mde` 是基于simplemde的fork版本 InscrybMDE 编辑器而适配Laravel的 `markdown` 编辑器。源码地址[InscrybMDE](https://gitee.com/wangningkai/inscryb-markdown-editor)

## 兼容版本

本扩展包经过测试，适配 `Laravel 5.5` 以上稳定版本（`5.5` 以下版本理论上也是可行的，但未经测试）。

>   特别说明：
>   本扩展使用的js及css 均使用 jsdelivr CDN ，为确保可用，建议将js与css下载到本地。

## 安装与配置

```
composer require wangningkai/laravel-mde

```

依赖安装完毕之后，如果 laravel版本 小于 5.6 请在 `app.php` 中添加：

```php
'providers' => [
    WangNingkai\Editor\EditorServiceProvider::class,
],
```

然后，执行下面 `artisan` 命令，选择编辑器相应选项，发布扩展包配置等项。

```bash
php artisan vendor:publish --force
```

```

<?php

/**
 * simplemde 配置选项，请查阅文档：https://gitee.com/wangningkai/inscryb-markdown-editor/ 了解具体设置项
 * 这里只列出一些比较重要的可配置项
 * 请注意，这里的配置项值必须为字符串型的 `ture` 或 `false`
 */
return [
    'autofocus' => 'true',  // 自动聚焦
    'autosave' => 'false',  // 自动按保存
    'forceSync' => 'true',  // 强制同步textarea
    'indentWithTabs' => 'true', // tab对齐
    'minHeight' => '480px', // 最小高度
    'maxHeight' => '720px', //最大高度
    'allowAtxHeaderWithoutSpace' => 'true',
    'strikethrough' => 'true', // 删除线
    'underscoresBreakWords' => 'true',
    'placeholder' => '在此输入内容...',
    'singleLineBreaks' => 'true', // 单行折行
    'spellChecker' => 'false', // 拼写检查
    'status' => 'true', // 状态栏
    'styleSelectedText' => 'true',
    'syncSideBySidePreviewScroll' => 'true', // 滚动预览
    'tabSize' => 4,
    'toolbarTips' => 'true',
    'example' => 'true', // 开启示例(可关闭)
];

```

现在您可以访问 `/laravel-mde/example` 路由，不出意外，您可以看到扩展包提供的示例页面。

图片上传支持拖拽，复制上传。

编辑器图片默认会上传到 `public/uploads/content` 目录下；编辑器相关功能配置位于 `config/editor.php` 文件中。

## 使用说明

在 `blade` 模版里面使用下面三个方法：`editor_css()` 、`editor_js()` 和 `editor_config('param1','param2')` 。
`editor_config()`需要传入两个参数，第一个参数为编辑器同步的textarea的id，第二个参数为自动按保存唯一id。

```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Markdown编辑器</title>
    {!! editor_css() !!}
</head>
<body>
    <div class="container" style="width:640 px;height:auto;margin:0 auto;">
        <textarea name="" id="meditor"></textarea>
    </div>
    {!! editor_js() !!}
    {!! editor_config('meditor','meditor-1') !!}
</body>
</html>
```