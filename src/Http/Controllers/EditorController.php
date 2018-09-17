<?php
namespace WangNingkai\LaravelMde\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Validator;

class EditorController extends Controller
{
    /**
     * 图片上传控制器
     *
     * @param  Request $requst
     * @return Response
     */
    public function ImageUpload(Request $request)
    {
        $field = 'mde-image-file';
        $rule = [$field => 'required|max:2048|image|dimensions:max_width=1920,max_height=1080'];
        $uploadPath = 'uploads/content';
        $result = editor_upload($field,$rule,$uploadPath,false,true);
        if ($result['status_code'] == 200) {
            $file = $result['data'];
            return response()->json(['code' => 200, 'filename' => $file['publicPath']]);
        } else {
            return response()->json(['code' => $result['status_code'],'filename' => $result['message']]);
        }
    }
}