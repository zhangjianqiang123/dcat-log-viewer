<?php

namespace Dcat\Admin\Helps\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Dcat\Admin\Helps\LogViewer;
use Dcat\Admin\Layout\Content;

class LogController extends Controller
{
    public function index($file = null, Content $content)
    {
        if ($file === null) {
            $file = (new LogViewer())->getLastModifiedLog();
        }

        $offset = request()->get('offset');
        
        $viewer = new LogViewer($file);
        
        
        return $content->header($viewer->getFilePath())->body(view('dcat-admin.helps::logs', [
            'logs'      => $viewer->fetch($offset),
            'logFiles'  => $viewer->getLogFiles(),
            'fileName'  => $viewer->file,
            'end'       => $viewer->getFilesize(),
            'tailPath'  => admin_route('log-viewer-tail', ['file' => $viewer->file]),
            'prevUrl'   => $viewer->getPrevPageUrl(),
            'nextUrl'   => $viewer->getNextPageUrl(),
            'filePath'  => $viewer->getFilePath(),
            'size'      => static::bytesToHuman($viewer->getFilesize()),
        ]));
    }

    public function tail($file, Request $request)
    {
        $offset = $request->get('offset');

        $viewer = new LogViewer($file);

        list($pos, $logs) = $viewer->tail($offset);

        return compact('pos', 'logs');
    }

    protected static function bytesToHuman($bytes)
    {
        $units = ['B', 'KB', 'MB', 'GB', 'TB', 'PB'];

        for ($i = 0; $bytes > 1024; $i++) {
            $bytes /= 1024;
        }

        return round($bytes, 2).' '.$units[$i];
    }
}
