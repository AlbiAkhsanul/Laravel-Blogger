<?php

namespace App\Models;

class PostManual
{
    private static $posts = [
        [
            'title' => 'Title Number One',
            'slug' => 'title-number-one',
            'author' => 'Author One',
            'body' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptatum iusto similique iste labore omnis, perferendis vitae reiciendis saepe molestias quia? Laboriosam, quo! Doloremque repellendus harum inventore officia error, dignissimos, quam ab labore tenetur ducimus et? Possimus, magnam. Ea ad in maiores a optio, voluptatum nobis eius eos debitis vero praesentium cumque laborum accusamus, incidunt, dolorum porro quam natus iure. Aliquid commodi doloremque excepturi debitis voluptate expedita blanditiis mollitia quibusdam. Neque libero sunt eveniet placeat veniam voluptatem quia praesentium, deserunt natus.'
        ],
        [
            'title' => 'Title Number Two',
            'slug' => 'title-number-two',
            'author' => 'Author Two',
            'body' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptatum iusto similique iste labore omnis, perferendis vitae reiciendis saepe molestias quia? Laboriosam, quo! Doloremque repellendus harum inventore officia error, dignissimos, quam ab labore tenetur ducimus et? Possimus, magnam. Ea ad in maiores a optio, voluptatum nobis eius eos debitis vero praesentium cumque laborum accusamus, incidunt, dolorum porro quam natus iure. Aliquid commodi doloremque excepturi debitis voluptate expedita blanditiis mollitia quibusdam. Neque libero sunt eveniet placeat veniam voluptatem quia praesentium, deserunt natus.'
        ],
        [
            'title' => 'Title Number Three',
            'slug' => 'title-number-three',
            'author' => 'Author Three',
            'body' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptatum iusto similique iste labore omnis, perferendis vitae reiciendis saepe molestias quia? Laboriosam, quo! Doloremque repellendus harum inventore officia error, dignissimos, quam ab labore tenetur ducimus et? Possimus, magnam. Ea ad in maiores a optio, voluptatum nobis eius eos debitis vero praesentium cumque laborum accusamus, incidunt, dolorum porro quam natus iure. Aliquid commodi doloremque excepturi debitis voluptate expedita blanditiis mollitia quibusdam. Neque libero sunt eveniet placeat veniam voluptatem quia praesentium, deserunt natus.'
        ]
    ];

    public static function getAll()
    {
        return collect(self::$posts);
    }

    public static function getPostBySlug($slug)
    {
        $posts = static::getAll();
        return $posts->firstWhere('slug', $slug); //Where $post(singular)['slug] === $slug
    }
}
