<?php

namespace App\Http\Controllers;

use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;
use App\Models\Product;
use Illuminate\Support\Facades\URL;

class BotManController extends Controller
{
    /**
     * Place your BotMan logic here.
     */
    public function handle()
    {
        $botman = app('botman');

        $botman->hears('{message}', function ($botman, $message) {
            $lowercaseMessage = strtolower($message);

            if ($lowercaseMessage == 'hi') {
                $this->startConversation($botman);
            } elseif ($lowercaseMessage == 'preferences') {
                $botman->startConversation(new PreferencesConversation());
            } elseif ($lowercaseMessage == 'question'){
                $botman->startConversation(new QuestionConversation());
            } else {
                $botman->reply("Start a conversation by saying hi or ask about preferences.");
            }
        });

        $botman->listen();
    }
}

class QuestionConversation extends Conversation
{
    public function run()
    {
        $this->say("Visit this <a href='https://tawk.to/fos' target='_blank'>link</a> for more information.");
        $this->say("You may ask for preference by typing 'Preferences'");
    }
}

class PreferencesConversation extends Conversation
{
    protected $userData = [];

    /**
     * Start the conversation.
     */
    public function run()
    {
        $this->askName();
    }

    /**
     * Ask user's name.
     */
    public function askName()
    {
        $this->ask('Hello! What is your Name?', function (Answer $answer) {
            $name = $answer->getText();
            $this->userData['name'] = $name;
            $this->say('Nice to meet you ' . $name);
            $this->askStylePreference();
        });
    }

    /**
     * Ask user's style preference.
     */
    public function askStylePreference()
    {
        $this->ask('What is your style preference? (Casual/Formal/Business Casual/Sporty/Vintage/Bohemian)', function (Answer $answer) {
            $stylePreference = $answer->getText();
            $this->userData['style_preference'] = $stylePreference;
            $this->say('Nice choice! Your style preference is ' . $stylePreference);
            $this->askFitPreference();
        });
    }

    /**
     * Ask user's fit preference.
     */
    public function askFitPreference()
    {
        $this->ask('What is your fit preference? (Slim/Regular/Loose)', function (Answer $answer) {
            $fitPreference = $answer->getText();
            $this->userData['fit_preference'] = $fitPreference;
            $this->say('Great! Your fit preference is ' . $fitPreference);
            $this->askColorPreference();
        });
    }

    public function askColorPreference()
    {
        $this->ask('What is your color preference?', function (Answer $answer) {
            $colorPreference = $answer->getText();
            $this->userData['color_preference'] = $colorPreference;
            $this->say('Nice! Your color preference is ' . $colorPreference);
            $this->askPatternPreference();
        });
    
    }
    public function askPatternPreference()
    {
        $this->ask('What is your pattern preference? (Stripes/Checks/Floral/Solid/Geometric)', function (Answer $answer) {
            $patternPreference = $answer->getText();
            $this->userData['pattern_preference'] = $patternPreference;
            $this->say('Interesting! Your pattern preference is ' . $patternPreference);
            $this->askTypePreference();
        });
    }
    public function askTypePreference()
    {
        $this->ask('What is your type preference? (Top/Bottom)', function (Answer $answer) {
            $typePreference = $answer->getText();
            $this->userData['type_preference'] = $typePreference;
            $this->say('Good! Your type preference is ' . $typePreference);
            // Suggest products based on preferences
            $this->suggestProducts();
        });
    }

    /**
     * Generate URL for product view.
     *
     * @param string $cateSlug
     * @param string $prodSlug
     * @return string
     */
    protected function generateProductUrl($cateSlug, $prodSlug)
    {
        return URL::to("/category/{$cateSlug}/{$prodSlug}");
    }

    /**
     * Suggest products based on user preferences.
     */
    public function suggestProducts()
    {
        // You can customize this query based on your product model and preferences.
        $products = Product::where('style', $this->userData['style_preference'])
            ->where('fit_type', $this->userData['fit_preference'])
            ->where('color', $this->userData['color_preference'])
            ->where('pattern', $this->userData['pattern_preference'])
            ->where('clothing_type', $this->userData['type_preference'])
            ->get();

        if ($products->isEmpty()) {
            $this->say('Sorry, we couldn\'t find any products matching your preferences. Please type "Preference" to restart the process');
        } else {
            $this->say('Here are some products that match your preferences:');

            foreach ($products as $product) {
                $productLink = $this->generateProductUrl($product->category->slug, $product->slug);
                $productInfo = "{$product->name}";

                // Use HTML to create a clickable link
                $this->say("<a href='{$productLink}' target='_blank'>{$productInfo}</a>");
            }
        }
        $this->say('If you want to make a new recommendation, just type "Preferences"');
    }
}