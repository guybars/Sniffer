while true; do
        urlsnarf | python3 processor.py
        sleep 15
done
