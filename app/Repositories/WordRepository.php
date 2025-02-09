<?php

namespace App\Repositories;

use App\Interfaces\WordRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Word;

class WordRepository implements WordRepositoryInterface
{
    protected $model;

    public function __construct(Word $word)
    {
        $this->model = $word;
    }

    public function getAllWordsWithTranslations(): Collection
    {
        return $this->model->with(['translations' => function ($query) {
            $query->select(['word_id', 'spanish_word', 'german_word']);
        }])->select(['id', 'english_word'])->get();
    }

    public function findWithTranslations(int $id): ?Word
    {
        return $this->model->with(['translations' => function ($query) {
            $query->select(['word_id', 'spanish_word', 'german_word']);
        }])->select(['id', 'english_word'])->find($id);
    }

    public function create(array $data): Word
    {
        $word = $this->model->create([
            'english_word' => $data['english_word']
        ]);
        $word->translations()->create([
            'spanish_word' => $data['translations']['spanish_word'],
            'german_word' => $data['translations']['german_word']
        ]);

        return $word;
    }

    public function update(Word $word, string $englishWord, array $translations): ?Word
    {
        $word->updateAttributes(['english_word' => $englishWord]);
        $word->updateTranslations($translations);

        return $word;
    }

    public function delete(Word $word): bool
    {
        $word->translations()->delete();
        return $word->delete();
    }
}