# Local Rag and LLM

Brackets refer to line numbers in python file.

# Steps for setting up mac OS

## Install ollama

- Install https://ollama.com/ and open so it is running (serve).
- Open terminal and pull in the LLM.
- ollama run llama2.
  - currently uses llama2 (52) as hardcoded in the python script.
  - Now you can close terminal as this model is now on your mac.

## Get your wordpress posts as JSON

- Download the zip in the repo.
- Visit your wordpress admin page and add a new plug in / Upload plugin.
- Choose the zip and acivate once installed.

## Create a new page

- Create a new page on your blog and add just the following shortcode [wordpress_export_to_json].
- Save / visit that page (this will execute the shortcode).

  - I got some errors making the page but it was ok.

- Check your "/wp-content" folder for a file "post-content.json".
- File name is hardcoded into wordpress script (42).
  - If the file did not get created, try first creating a blank file (same file name) "post-content.json" as your site may not have permission to create file in the directory, but it may be able to update a file.

## Run queries against your JSON file

- Open rag-json.py in VS Code.
- Right click in the python window and select run python - run python file in terminal.
- You will now be prompted in the terminal to enter a queries.
- Wait for output, be suprised and overjoyed!

## Sources

- https://overcast.fm/+4jBEcSNk4 (podcast)
- https://learnbybuilding.ai/tutorials/rag-from-scratch#getting-a-collection-of-documents (tutorial)
- https://huggingface.co/ (nlp library)
- https://ollama.com/ (web app)
- https://research.ibm.com/blog/retrieval-augmented-generation-RAG (paper)
- https://gist.github.com/jsnelders/fd22ebc26530468125ffed2d5d1eb279 (starter code for wordpress)
