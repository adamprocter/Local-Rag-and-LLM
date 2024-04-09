import json

# Load the JavaScript data
with open('/Users/ap2x07/Desktop/tweets.js', 'r') as file:
    js_data = file.read()

# Extracting tweets data from JavaScript
start_index = js_data.find('[')
end_index = js_data.rfind(']') + 1
tweets_data = js_data[start_index:end_index]

# Parse JSON data
tweets = json.loads(tweets_data)

# Extract full_text from each tweet
full_texts = [tweet['tweet']['full_text'] for tweet in tweets]

# Save extracted full_texts into a JSON file
with open('/Users/ap2x07/Desktop/full_texts.json', 'w') as file:
    json.dump(full_texts, file, indent=2)

print("Full texts extracted and saved into 'full_texts.json' file.")
