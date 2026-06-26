<?php

namespace App\Controllers;

use App\Libraries\ImageCrud;
use CodeIgniter\HTTP\RedirectResponse;

class ImagesExamples extends BaseController
{
    public function __construct()
    {
        helper('url');
    }

    private function exampleOutput(?object $output = null): string
    {
        $output ??= (object) [
            'output' => '',
            'js_files' => [],
            'css_files' => [],
        ];

        return view('image_crud/example', [
            'output'    => $output->output ?? '',
            'js_files'  => $output->js_files ?? [],
            'css_files' => $output->css_files ?? [],
        ]);
    }

    public function index(): string
    {
        return $this->exampleOutput();
    }

    public function example1(...$segments): string
    {
        $imageCrud = new ImageCrud();

        $imageCrud
            ->set_primary_key_field('id')
            ->set_url_field('url')
            ->set_table('example_1')
            ->set_image_path('assets/uploads');

        return $this->exampleOutput($imageCrud->render());
    }

    public function example2(...$segments): string
    {
        $imageCrud = new ImageCrud();

        $imageCrud
            ->set_primary_key_field('id')
            ->set_url_field('url')
            ->set_table('example_2')
            ->set_ordering_field('priority')
            ->set_image_path('assets/uploads');

        return $this->exampleOutput($imageCrud->render());
    }

    public function example3(...$segments): string|RedirectResponse
    {
        $uriSegments = $this->request->getUri()->getSegments();

        if (! isset($uriSegments[2])) {
            return redirect()->to(site_url('images-examples/example3/22'));
        }

        $imageCrud = new ImageCrud();

        $imageCrud
            ->set_primary_key_field('id')
            ->set_url_field('url')
            ->set_table('example_3')
            ->set_relation_field('category_id')
            ->set_ordering_field('priority')
            ->set_image_path('assets/uploads');

        return $this->exampleOutput($imageCrud->render());
    }

    public function example4(...$segments): string
    {
        $imageCrud = new ImageCrud();

        $imageCrud
            ->set_primary_key_field('id')
            ->set_url_field('url')
            ->set_title_field('title')
            ->set_table('example_4')
            ->set_ordering_field('priority')
            ->set_image_path('assets/uploads');

        return $this->exampleOutput($imageCrud->render());
    }

    public function simple_photo_gallery(...$segments): string
    {
        $imageCrud = new ImageCrud();

        $imageCrud
            ->unset_upload()
            ->unset_delete()
            ->set_primary_key_field('id')
            ->set_url_field('url')
            ->set_table('example_4')
            ->set_image_path('assets/uploads');

        return $this->exampleOutput($imageCrud->render());
    }
}
